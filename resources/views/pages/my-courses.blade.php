@extends('layouts.app')

@section('title', 'Mis Cursos | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">My Courses</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">My Courses</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="user-dashboard-box mt-3">
                        <div class="user-dashboard-content w-100">
                            <div class="content-title-box">
                                <form class="search-course-form" action="{{ route('my.courses') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" placeholder="Search your courses" aria-label="Search courses">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="content-box p-5">
                                @foreach($enrolledCourses as $course)
                                    <div class="course-item-student mb-5">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="course-thumbnail">
                                                    <img src="{{ asset('assets/img/' . $course['image']) }}" alt="{{ $course['title'] }}" class="img-fluid rounded">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="course-info-student">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <h5 class="course-title-student mb-2">{{ $course['title'] }}</h5>
                                                    </div>
                                                    <div class="course-meta-student mb-2">
                                                        <span class="mr-3"><i class="fas fa-play-circle mr-1"></i> Lectures {{ $course['lectures'] }}</span>
                                                        <span class="mr-3"><i class="fas fa-question-circle mr-1"></i> Quizzes {{ $course['quizzes'] }}</span>
                                                        <span><i class="far fa-clock mr-1"></i> {{ $course['duration'] }}</span>
                                                    </div>
                                                    <div class="progress mb-2" style="height: 8px;">
                                                        <div class="progress-bar" role="progressbar" style="width: {{ $course['progress'] }}%;" aria-valuenow="{{ $course['progress'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <span class="text-muted small">{{ $course['progress'] }}%</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="instructor-info-student">
                                                            <img src="{{ asset('assets/img/' . $course['avatar']) }}" alt="{{ $course['instructor'] }}" class="rounded-circle mr-2" style="width: 30px; height: 30px;">
                                                            <span class="mr-2">{{ $course['instructor'] }}</span>
                                                            <span class="text-warning">
                                                                @for($s = 1; $s <= 5; $s++)
                                                                    <i class="{{ $s <= $course['rating'] ? 'fas' : 'far' }} fa-star"></i>
                                                                @endfor
                                                            </span>
                                                        </div>
                                                        <a href="{{ route('lessons', ['slug' => $course['slug'] ?? null]) }}" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-play-circle mr-1"></i> Start now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
