@extends('layouts.app')

@section('title', 'Iniciar Sesión | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Login</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">Registered user</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="user-dashboard-box mt-3">
                        <div class="user-dashboard-content w-100 login-form">
                            <div class="content-title-box">
                                <div class="title">Login</div>
                                <div class="subtitle">Provide your valid login credentials.</div>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger mx-4 mt-3 mb-0">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="content-box">
                                    <div class="basic-group">
                                        <div class="form-group">
                                            <label for="login-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                            <input type="email" class="form-control" name="email" id="login-email" placeholder="Email" value="{{ old('email', 'signe.thompson@example.com') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="login-password"><span class="input-field-icon"><i class="fas fa-lock"></i></span> Password:</label>
                                            <input type="password" class="form-control" name="password" id="login-password" placeholder="Password" value="password123" required>
                                        </div>
                                        <small class="text-muted d-block mt-2">
                                            Cuentas Demo: <code>signe.thompson@example.com</code> (Estudiante) o <code>admin@academiacip.edu.pe</code> (Admin) | Clave: <code>password123</code>
                                        </small>
                                    </div>
                                </div>
                                <div class="content-update-box">
                                    <button type="submit" class="btn">Login</button>
                                </div>
                                <div class="forgot-pass text-center">
                                    <span>Or</span>
                                    <a href="javascript:;" onclick="toggoleForm('forgot_password')">Forgot password</a>
                                </div>
                                <div class="account-have text-center">
                                    Do not have an account? <a href="{{ route('register') }}">Sign up</a>
                                </div>
                            </form>
                        </div>

                        <div class="user-dashboard-content w-100 forgot-password-form hidden">
                            <div class="content-title-box">
                                <div class="title">Forgot password</div>
                                <div class="subtitle">Provide your email address to get password.</div>
                            </div>
                            <form action="{{ route('login') }}" method="GET">
                                <div class="content-box">
                                    <div class="basic-group">
                                        <div class="form-group">
                                            <label for="forgot-email"><span class="input-field-icon"><i class="fas fa-envelope"></i></span> Email:</label>
                                            <input type="email" class="form-control" name="email" id="forgot-email" placeholder="Email" required>
                                            <small class="form-text text-muted">Provide your email address to get password.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-update-box">
                                    <button type="submit" class="btn">Reset password</button>
                                </div>
                                <div class="forgot-pass text-center">
                                    Want to go back? <a href="javascript:;" onclick="toggoleForm('login')">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
