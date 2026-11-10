@extends('layouts.app')

@section('title', $course->title . ' | Academia CIP')

@section('content')

    <section class="course-header-area">
        <div class="container">
            <div class="row align-items-right">
                <div class="col-lg-8">
                    <div class="course-header-wrap">
                        <h1 class="title">{{ $course->title }}</h1>
                        <p class="subtitle">{{ $course->subtitle }}</p>
                        <div class="rating-row">
                            <span class="course-badge best-seller">{{ $course->level }}</span>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $course->rating ? 'text-warning' : '' }}"></i>
                            @endfor
                            <span class="d-inline-block average-rating">{{ number_format($course->rating, 1) }}</span>
                            <span> ({{ $course->category?->name ?? 'General' }})</span>
                        </div>
                        <div class="created-row">
                            <span class="created-by">Created by <a href="#">{{ $course->instructor?->name ?? 'Juan Urrego' }}</a></span>
                            <span class="last-updated-date">Last updated {{ $course->updated_at?->format('D, d-M-Y') ?? 'Wed, 14-Jan-2026' }}</span>
                            <span class="comment"><i class="fas fa-comment"></i>{{ $course->language }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-content-area">
        <div class="container">
            <div class="row">

                <div class="col-12 d-block d-lg-none">
                    <div class="mt-3">
                        <div class="preview-video-box">
                            <a data-toggle="modal" data-target="#CoursePreviewModal">
                                <img src="{{ asset('assets/img/' . $course->image) }}" alt="{{ $course->title }}" class="img-fluid">
                                <span class="preview-text">Preview this course</span>
                                <span class="play-btn"></span>
                            </a>
                        </div>
                        <div class="course-sidebar-text-box">
                            <div class="price">
                                <span class="current-price">${{ number_format((float) $course->price, 2) }}</span>
                                @if($course->old_price)
                                    <span class="original-price">${{ number_format((float) $course->old_price, 2) }}</span>
                                @endif
                            </div>
                            <div class="buy-btns">
                                <a href="{{ route('cart') }}" class="btn btn-buy-now">Buy now</a>
                                <a href="{{ route('cart') }}" class="btn btn-add-cart">Add to cart</a>
                            </div>
                            <div class="includes">
                                <div class="title"><b>Includes:</b></div>
                                <ul>
                                    <li><i class="far fa-file-video"></i> {{ $course->duration }} On demand videos</li>
                                    <li><i class="far fa-file"></i> {{ $course->lessons_count }} Lessons</li>
                                    <li><i class="far fa-compass"></i> Full lifetime access</li>
                                    <li><i class="fas fa-mobile-alt"></i> Access on mobile and tv</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    @if(!empty($course->outcomes))
                        <div class="what-you-get-box">
                            <div class="what-you-get-title">What will i learn?</div>
                            <ul class="what-you-get__items">
                                @foreach($course->outcomes as $outcome)
                                    <li>{{ $outcome }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                    @endif

                    <div class="course-curriculum-box">
                        <div class="course-curriculum-title clearfix">
                            <div class="title float-left">Curriculum for this course</div>
                            <div class="float-right">
                                <span class="total-lectures">{{ $course->lessons_count }} Lessons</span>
                                <span class="total-time">{{ $course->duration }}</span>
                            </div>
                        </div>
                        <div class="course-curriculum-accordion">
                            @foreach($course->sections as $index => $section)
                                <div class="lecture-group-wrapper">
                                    <div class="lecture-group-title clearfix" data-toggle="collapse" data-target="#collapse{{ $section->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                        <div class="title float-left">{{ $section->title }}</div>
                                        <div class="float-right">
                                            <span class="total-lectures">{{ $section->lessons->count() }} Lessons</span>
                                        </div>
                                    </div>
                                    <div id="collapse{{ $section->id }}" class="lecture-list collapse {{ $index === 0 ? 'show' : '' }}">
                                        <ul>
                                            @foreach($section->lessons as $lesson)
                                                <li class="lecture has-preview">
                                                    <span class="lecture-title">
                                                        <a href="{{ route('lessons', ['slug' => $course->slug]) }}" class="text-dark">
                                                            {{ $lesson->title }}
                                                        </a>
                                                    </span>
                                                    <span class="lecture-time float-right">{{ $lesson->duration }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if(!empty($course->requirements))
                        <div class="requirements-box">
                            <div class="requirements-title">Requirements</div>
                            <div class="requirements-content">
                                <ul class="requirements__list">
                                    @foreach($course->requirements as $req)
                                        <li>{{ $req }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="description-box view-more-parent expanded">
                        <div class="description-title">Description</div>
                        <div class="description-content-wrap">
                            <div class="description-content">
                                <div class="course-description">
                                    <p>{{ $course->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="about-instructor-box">
                        <div class="about-instructor-title">About the instructor</div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="about-instructor-image">
                                    <img src="{{ asset('assets/img/' . ($course->instructor?->avatar ?? 'instructor1.jpg')) }}" alt="" class="img-fluid">
                                    <ul>
                                        <li><i class="fas fa-comment"></i><b> 2</b> Reviews</li>
                                        <li><i class="fas fa-user"></i><b> 120</b> Students</li>
                                        <li><i class="fas fa-play-circle"></i><b> 9</b> Courses</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="about-instructor-details view-more-parent expanded has-hide">
                                    <div class="instructor-name">{{ $course->instructor?->name ?? 'Juan Urrego' }}</div>
                                    <div class="instructor-bio">
                                        <p>{{ $course->instructor?->bio ?? 'Instructor certificado en la plataforma Academia CIP.' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="course-sidebar natural" style="top: auto;">
                        <div class="preview-video-box">
                            <a data-toggle="modal" data-target="#CoursePreviewModal">
                                <img src="{{ asset('assets/img/' . $course->image) }}" alt="{{ $course->title }}" class="img-fluid">
                                <span class="preview-text">Preview this course</span>
                                <span class="play-btn"></span>
                            </a>
                        </div>
                        <div class="course-sidebar-text-box">
                            <div class="price">
                                <span class="current-price">${{ number_format((float) $course->price, 2) }}</span>
                                @if($course->old_price)
                                    <span class="original-price">${{ number_format((float) $course->old_price, 2) }}</span>
                                @endif
                            </div>
                            <div class="buy-btns">
                                <a href="{{ route('cart') }}" class="btn btn-buy-now">Buy now</a>
                                <a href="{{ route('cart') }}" class="btn btn-add-cart">Add to cart</a>
                                <a href="{{ route('lessons', ['slug' => $course->slug]) }}" class="btn btn-outline-secondary btn-block mt-2">Ir al Aula Virtual</a>
                            </div>
                            <div class="includes">
                                <div class="title"><b>Includes:</b></div>
                                <ul>
                                    <li><i class="far fa-file-video"></i> {{ $course->duration }} On demand videos</li>
                                    <li><i class="far fa-file"></i> {{ $course->lessons_count }} Lessons</li>
                                    <li><i class="far fa-compass"></i> Full lifetime access</li>
                                    <li><i class="fas fa-mobile-alt"></i> Access on mobile and tv</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="CoursePreviewModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls class="embed-responsive-item">
                            <source src="{{ asset('assets/video/' . $course->preview_video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
