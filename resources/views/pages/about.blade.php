@extends('layouts.app')

@section('title', 'Sobre Nosotros | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">About Us</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-1">
        <div class="container">
            <div class="row">
                <div class="col" style="padding: 35px;">
                    <h2>This is about us</h2>
                    <p>Welcome to Academy. It will help you to learn in a new ways.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
