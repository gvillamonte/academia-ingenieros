@extends('layouts.app')

@section('title', 'Aula Virtual - ' . $course->title . ' | Academia CIP')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plyr.css') }}">
@endpush

@section('content')

    <section class="category-header-area p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('my.courses') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('course.detail', ['slug' => $course->slug]) }}">{{ $course->title }}</a></li>
                            <li class="breadcrumb-item active">Aula Virtual</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="lessons-area">
        <div class="container-fluid">
            <div class="row">
                <!-- Video Player and Content -->
                <div class="col-lg-9 p-0">
                    <div class="video-player-section bg-dark">
                        <video id="player" playsinline controls>
                            <source src="{{ asset('assets/video/6967d9d02be6648.mp4') }}" type="video/mp4" />
                        </video>
                    </div>

                    <div class="lesson-tabs-section bg-white">
                        <ul class="nav nav-tabs border-bottom" id="lessonTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab">
                                    <i class="fas fa-info-circle mr-2"></i> Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="qa-tab" data-toggle="tab" href="#qa" role="tab">
                                    <i class="fas fa-question-circle mr-2"></i> Q&amp;A
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="certificate-tab" data-toggle="tab" href="#certificate" role="tab">
                                    <i class="fas fa-certificate mr-2"></i> Certificate
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content p-4" id="lessonTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                <h5 class="mb-2">{{ $course->title }}</h5>
                                <p class="text-muted">{{ $course->subtitle }}</p>
                                <p>{{ $course->description }}</p>
                            </div>

                            <div class="tab-pane fade" id="qa" role="tabpanel">
                                <div class="qa-section">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">Questions in this course</h5>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus mr-2"></i> Ask question
                                        </button>
                                    </div>
                                    <div class="questions-list">
                                        <div class="question-item border-bottom pb-3 mb-3">
                                            <div class="d-flex">
                                                <div class="question-content flex-grow-1">
                                                    <h6 class="mb-2"><a href="#" class="text-dark">Consulta sobre configuración del entorno</a></h6>
                                                    <p class="text-muted small mb-2">¿Se puede trabajar este curso directamente sobre Laragon con PHP 8.2?</p>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/img/student3.jpg') }}" alt="User" class="rounded-circle mr-2" style="width: 24px; height: 24px;">
                                                        <small class="text-muted">Signe Thompson</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="certificate" role="tabpanel">
                                <h5 class="mb-3">Certificate</h5>
                                <p>Complete all {{ $course->lessons_count }} lessons in <strong>{{ $course->title }}</strong> to earn your CIP certificate.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Content Sidebar -->
                <div class="col-lg-3 bg-light p-0">
                    <div class="course-content-sidebar">
                        <div class="sidebar-header p-3 border-bottom bg-white">
                            <h5 class="mb-2 text-center">Course content</h5>
                            <div class="progress mb-2" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 28%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="lessons-list">
                            @foreach($course->sections as $sIndex => $section)
                                <div class="lesson-section">
                                    <div class="section-header p-3 border-bottom bg-white" data-toggle="collapse" data-target="#section{{ $section->id }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0 font-weight-bold">{{ $section->title }}</h6>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div id="section{{ $section->id }}" class="collapse {{ $sIndex === 0 ? 'show' : '' }}">
                                        @foreach($section->lessons as $lIndex => $lesson)
                                            <div class="lesson-item p-3 border-bottom {{ ($sIndex === 0 && $lIndex === 1) ? 'bg-academy' : '' }} d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="custom-control custom-checkbox mr-2">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck{{ $lesson->id }}" {{ ($sIndex === 0 && $lIndex === 0) ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customCheck{{ $lesson->id }}"></label>
                                                    </div>
                                                    <i class="{{ $lesson->lesson_type === 'document' ? 'far fa-file-alt' : 'far fa-play-circle' }} mr-2 text-muted"></i>
                                                    <div>
                                                        <div class="lesson-title {{ ($sIndex === 0 && $lIndex === 1) ? 'font-weight-bold' : '' }}">{{ $lesson->title }}</div>
                                                        <small class="text-muted">{{ $lesson->lesson_type }}</small>
                                                    </div>
                                                </div>
                                                <span class="text-muted small">{{ $lesson->duration }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://unpkg.com/plyr@3.8.4/dist/plyr.js"></script>
    <script>
        if (typeof Plyr !== 'undefined') {
            new Plyr('#player', {
                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
                settings: ['quality', 'speed'],
                quality: {
                    default: 720,
                    options: [1080, 720, 480, 360]
                }
            });
        }
    </script>
@endpush
