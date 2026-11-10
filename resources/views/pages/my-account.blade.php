@extends('layouts.app')

@section('title', 'Mi Cuenta | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">My Account</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">My Account</h1>
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
                            <div class="profile-photo-section p-4 mb-4 bg-white rounded">

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="profile-photo-large mr-4">
                                            <img src="{{ asset('assets/img/' . ($user?->avatar ?? 'student6.jpg')) }}" alt="Profile photo" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                        <div>
                                            <h5 class="mb-1">{{ $user?->name ?? 'Signe Thompson' }}</h5>
                                            <p class="text-muted mb-0">Rol: <span class="badge badge-info text-uppercase">{{ $user?->role ?? 'student' }}</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-dark" type="button">
                                            <i class="fas fa-upload mr-2"></i> Upload photo
                                        </button>
                                    </div>
                                </div>

                                <div class="content-title-box mt-4">
                                    <div class="title">Profile info</div>
                                </div>

                                <form action="{{ route('my.account.update') }}" method="POST">
                                    @csrf
                                    <div class="p-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-light border-right-0">
                                                                <i class="fas fa-user text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control border-left-0" id="first_name" name="first_name" value="{{ old('first_name', $user?->first_name ?? 'Signe') }}" placeholder="First name" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-light border-right-0">
                                                                <i class="fas fa-user text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control border-left-0" id="last_name" name="last_name" value="{{ old('last_name', $user?->last_name ?? 'Thompson') }}" placeholder="Last name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-light border-right-0">
                                                                <i class="fas fa-envelope text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control border-left-0" id="email" name="email" value="{{ old('email', $user?->email ?? 'signe.thompson@example.com') }}" placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">New Password (optional)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-light border-right-0">
                                                                <i class="fas fa-lock text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control border-left-0" id="password" name="password" value="********" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-update-box mt-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-2"></i> Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
