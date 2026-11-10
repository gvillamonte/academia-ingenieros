@extends('layouts.app')

@section('title', 'Registro | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Sign up</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">Register yourself</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="user-dashboard-box mt-3">
                        <div class="user-dashboard-content w-100 register-form">
                            <div class="content-title-box">
                                <div class="title">Registration form</div>
                                <div class="subtitle">Sign up and start learning.</div>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger mx-4 mt-3 mb-0">
                                    <ul class="mb-0 pl-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="content-box">
                                    <div class="basic-group">
                                        <div class="form-group">
                                            <label for="first_name"><span class="input-field-icon"><i class="fas fa-user"></i></span> First name:</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name"><span class="input-field-icon"><i class="fas fa-user"></i></span> Last name:</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="{{ old('last_name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="registration-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                            <input type="email" class="form-control" name="email" id="registration-email" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="registration-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                            <input type="password" class="form-control" name="password" id="registration-password" placeholder="Password (min. 6 characters)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-update-box">
                                    <button type="submit" class="btn">Sign up</button>
                                </div>
                                <div class="account-have text-center">
                                    Already have an account? <a href="{{ route('login') }}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
