@extends('layouts.app')

@section('title', 'Cursos | Plataforma de Educación Online')

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
                <a href="{{ route('courses') }}" style="float: right; font-size: 19px; margin-right: 5px;"><i class="fas fa-sync-alt"></i></a>
            </div>

            <div class="row">
                @include('partials.course-filter')

                <div class="col-lg-9">
                    <div class="category-course-list">
                        <div class="row">
                            @foreach($courses as $course)
                                <div class="col-md-4 col-lg-4">
                                    @include('components.course-card', ['course' => $course])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
