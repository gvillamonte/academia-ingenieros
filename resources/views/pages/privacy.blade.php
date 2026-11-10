@extends('layouts.app')

@section('title', 'Política de Privacidad | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Privacy Policy</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">Privacy Policy</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-1">
        <div class="container">
            <div class="row">
                <div class="col" style="padding: 35px;">
                    <h2>Privacy Policy</h2>
                    <p>Welcome to Academy. It will help you to learn in a new ways.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
