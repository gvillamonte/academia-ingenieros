@extends('layouts.app')

@section('title', 'Carrito de Compras | Academia CIP')

@section('content')

    <section class="category-header-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Shopping cart</a></li>
                        </ol>
                    </nav>
                    <h1 class="category-name">Shopping cart</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="category-course-list-area mt-4 pt-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="user-dashboard-box mt-3">
                        <div class="p-4">
                            <h3 class="mb-4">Your cart items</h3>

                            <div class="row border-bottom pb-3 mb-3">
                                <div class="col-md-6"><strong>Items</strong></div>
                                <div class="col-md-6 text-right"><strong>Price</strong></div>
                            </div>

                            <div class="row border-bottom pb-3 mb-3 align-items-center">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-start">
                                        <img src="{{ asset('assets/img/course_thumbnail_default_12.jpg') }}" alt="Course thumbnail" class="img-fluid mr-3" style="width: 120px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-2 font-weight-bold"><a href="{{ route('course.detail') }}" class="text-dark">DESIGN RULES: Principles + Practices for Great UI Design</a></h6>
                                            <p class="text-muted small mb-0">Getting Started is the perfect course for you. In this course, you'll learn how to build apps with Flutter...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="text-right mr-3">
                                            <span class="h5 font-weight-bold text-dark mr-2">$99</span>
                                            <span class="text-muted" style="text-decoration: line-through;">$150</span>
                                        </div>
                                        <button class="btn-link border-0 text-danger p-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row border-bottom pb-3 mb-3 align-items-center">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-start">
                                        <img src="{{ asset('assets/img/course_thumbnail_default_13.jpg') }}" alt="Course thumbnail" class="img-fluid mr-3" style="width: 120px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-2 font-weight-bold"><a href="{{ route('course.detail') }}" class="text-dark">Introduction and Learn bootstrap</a></h6>
                                            <p class="text-muted small mb-0">Vue is a progressive framework for building user interfaces.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="text-right mr-3">
                                            <span class="h5 font-weight-bold text-dark">$359</span>
                                        </div>
                                        <button class="btn-link border-0 text-danger p-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card shadow-sm mt-3">
                        <div class="card-body">
                            <h5 class="mb-4">Total</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Subtotal</span>
                                <span class="font-weight-bold">$458</span>
                            </div>
                            <div class="d-flex justify-content-between mb-4 pb-3 border-bottom">
                                <span class="text-muted">Total</span>
                                <span class="font-weight-bold">$458</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Apply coupon">
                                <button class="btn btn-primary" type="button">Apply</button>
                            </div>
                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="sendAsGift">
                                <label class="form-check-label" for="sendAsGift">Send as a gift</label>
                            </div>
                            <a href="{{ route('my.courses') }}" class="btn btn-primary btn-block btn-lg">
                                Continue to payment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
