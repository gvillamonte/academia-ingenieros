@extends('layouts.app')

@section('title', 'Lista de Cursos | Plataforma de Educación Online')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
                            <li class="breadcrumb-item active">Responsive Design</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area">
        <div class="container">
            <div class="category-filter-box filter-box clearfix">
                <span>Showing on this page : {{ count($courses) }}</span>
                <a href="{{ route('courses') }}" style="float: right; font-size: 19px; margin-left: 5px;"><i class="fas fa-th"></i></a>
                <a href="{{ route('courses.list') }}" style="float: right; font-size: 19px;"><i class="fas fa-th-list"></i></a>
                <a href="{{ route('courses.list') }}" style="float: right; font-size: 19px; margin-right: 5px;"><i class="fas fa-sync-alt"></i></a>
            </div>

            <div class="row">
                @include('partials.course-filter')

                <div class="col-lg-9">
                    <div class="category-course-list">
                        <ul>
                            @foreach($courses as $course)
                                <li>
                                    <div class="course-box-2">
                                        <div class="course-image">
                                            <a href="{{ route('course.detail', ['slug' => $course['slug'] ?? null]) }}">
                                                <img src="{{ asset('assets/img/' . $course['image']) }}" alt="{{ $course['title'] }}" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="course-details">
                                            <a href="{{ route('course.detail', ['slug' => $course['slug'] ?? null]) }}" class="course-title">{{ $course['title'] }}</a>
                                            <p class="course-instructor">
                                                <span class="instructor-name">{{ $course['instructor'] ?? 'juan urrego' }}</span>
                                            </p>
                                            <div class="course-subtitle">
                                                {{ $course['subtitle'] ?? 'Learn how to confidently develop custom & profitable Responsive WordPress Themes and Websites with no prior experience.' }}
                                            </div>
                                            <div class="course-meta">
                                                <span><i class="fas fa-play-circle"></i> {{ $course['lessons'] ?? '4 Lessons' }}</span>
                                                <span><i class="far fa-clock"></i> {{ $course['duration'] ?? '00:55:00 Hours' }}</span>
                                                <span><i class="fas fa-closed-captioning"></i> {{ $course['language'] ?? 'English' }}</span>
                                                <span><i class="fa fa-level-up"></i> Beginner</span>
                                            </div>
                                        </div>
                                        <div class="course-price-rating">
                                            <div class="course-price">
                                                <span class="current-price">{{ $course['price'] }}</span>
                                                @if(!empty($course['old_price']))
                                                    <span class="original-price">{{ $course['old_price'] }}</span>
                                                @endif
                                            </div>
                                            <div class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= ($course['rating'] ?? 0) ? 'filled' : '' }}"></i>
                                                @endfor
                                                <span class="d-inline-block average-rating">{{ $course['rating'] ?? 0 }}</span>
                                            </div>
                                            <div class="rating-number">
                                                {{ $course['rating'] ?? 0 }} Ratings
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
