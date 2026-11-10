@extends('layouts.app')

@section('title', 'Plataforma de Educación Online | Inicio')

@section('content')

    <!-- =====================================
    Home - Learn on your schedule
    ====================================== -->
    <section class="home-banner-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <div class="home-banner-wrap">
                        <h2>Learn on your schedule</h2>
                        <p>
                            Study any topic, anytime. Explore thousands of courses for the lowest price ever!
                        </p>
                        <form action="{{ route('courses') }}" method="GET">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="query"
                                    placeholder="What do you want to learn?"
                                >
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =====================================
    Sección 3 - Highlights
    ====================================== -->
    <section class="home-fact-area">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fas fa-bullseye float-left"></i>
                        <div class="text-box">
                            <h4>13 Online courses</h4>
                            <p>Explore a variety of fresh topics</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fa fa-check float-left"></i>
                        <div class="text-box">
                            <h4>Expert instruction</h4>
                            <p>Find the right course for you</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fa fa-clock float-left"></i>
                        <div class="text-box">
                            <h4>Lifetime access</h4>
                            <p>Learn on your schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =====================================
    Carousel Top Courses
    ====================================== -->
    <section class="course-carousel-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h2 class="course-carousel-title">Top courses</h2>
                    <div class="course-carousel">
                        @foreach($topCourses as $course)
                            @include('components.course-card', ['course' => $course])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =====================================
    Carousel Top 10 Latest courses
    ====================================== -->
    <section class="course-carousel-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h2 class="course-carousel-title">Top 10 Latest courses</h2>
                    <div class="course-carousel">
                        @foreach($latestCourses as $course)
                            @include('components.course-card', ['course' => $course])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
