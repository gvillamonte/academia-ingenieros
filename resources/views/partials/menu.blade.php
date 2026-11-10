<!-- =====================================
Menú
====================================== -->
<section class="menu-area">
    <div class="container-xl">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <!-- =====================================
                    Menú Mobile
                    ====================================== -->
                    <ul class="mobile-header-buttons">
                        <li>
                            <a class="mobile-nav-trigger" href="#">
                                Menu
                                <span></span>
                            </a>
                        </li>
                        <li>
                            <a class="mobile-search-trigger" href="#">
                                Search
                                <span></span>
                            </a>
                        </li>
                    </ul>

                    <a href="{{ route('home') }}" class="navbar-brand">
                        <img src="{{ asset('assets/img/logo-dark.png') }}" alt="Academy Logo" height="35">
                    </a>

                    <div class="main-nav-wrap">
                        <div class="mobile-overlay"></div>

                        <ul class="mobile-main-nav">
                            <div class="mobile-menu-helper-top"></div>

                            <li class="has-children">
                                <a href="#">
                                    <i class="fas fa-th d-inline"></i>
                                    <span>Courses</span>
                                    <span class="has-sub-category">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>

                                <ul class="category corner-triangle top-left is-hidden">
                                    <li class="go-back">
                                        <a href="#">
                                            <i class="fas fa-angle-left"></i>
                                            Menu
                                        </a>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fas fa-desktop"></i></span>
                                            <span>Web Design</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="{{ route('courses') }}">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fas fa-desktop"></i></span>
                                                    Web Design
                                                </a>
                                            </li>
                                            <li><a href="{{ route('courses') }}">Responsive Design</a></li>
                                            <li><a href="{{ route('courses') }}">WordPress Theme</a></li>
                                            <li><a href="{{ route('courses') }}">Bootstrap</a></li>
                                            <li><a href="{{ route('courses') }}">HTML &amp; CSS</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                                            <span>Graphic Design</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                                                    Graphic Design
                                                </a>
                                            </li>
                                            <li><a href="{{ route('courses') }}">Photoshop</a></li>
                                            <li><a href="{{ route('courses') }}">Adobe Illustrator</a></li>
                                            <li><a href="{{ route('courses') }}">Drawing</a></li>
                                            <li><a href="{{ route('courses') }}">Logo Design</a></li>
                                            <li><a href="{{ route('courses') }}">Digital Art</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fas fa-male"></i></span>
                                            <span>User Experience</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fas fa-male"></i></span>
                                                    User Experience
                                                </a>
                                            </li>
                                            <li><a href="{{ route('courses') }}">User Experience Design</a></li>
                                            <li><a href="{{ route('courses') }}">Mobile App Design</a></li>
                                            <li><a href="{{ route('courses') }}">User Interface</a></li>
                                            <li><a href="{{ route('courses') }}">Design Thinking</a></li>
                                            <li><a href="{{ route('courses') }}">Figma</a></li>
                                            <li><a href="{{ route('courses') }}">Prototyping</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fas fa-magic"></i></span>
                                            <span>Interior Design</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fas fa-magic"></i></span>
                                                    Interior Design
                                                </a>
                                            </li>
                                            <li><a href="{{ route('courses') }}">Color Theory</a></li>
                                            <li><a href="{{ route('courses') }}">Lighting Design</a></li>
                                            <li><a href="{{ route('courses') }}">SketchUp</a></li>
                                            <li><a href="{{ route('courses') }}">Home Improvement</a></li>
                                            <li><a href="{{ route('courses') }}">3D Lighting</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fas fa-cube"></i></span>
                                            <span>3D and Animation</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fas fa-cube"></i></span>
                                                    3D and Animation
                                                </a>
                                            </li>
                                            <li><a href="{{ route('courses') }}">Blender</a></li>
                                            <li><a href="{{ route('courses') }}">Motion Graphics</a></li>
                                            <li><a href="{{ route('courses') }}">After Effects</a></li>
                                            <li><a href="{{ route('courses') }}">Maya</a></li>
                                            <li><a href="{{ route('courses') }}">zBrush</a></li>
                                            <li><a href="{{ route('courses') }}">Character Modeling</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fas fa-user-secret"></i></span>
                                            <span>Fashion</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fas fa-user-secret"></i></span>
                                                    Fashion
                                                </a>
                                            </li>
                                            <li><a href="{{ route('courses') }}">Fashion Design</a></li>
                                            <li><a href="{{ route('courses') }}">Sewing</a></li>
                                            <li><a href="{{ route('courses') }}">T-shirt Design</a></li>
                                            <li><a href="{{ route('courses') }}">Jewelry Design</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-children">
                                        <a href="#">
                                            <span class="icon"><i class="fab fa-500px"></i></span>
                                            <span>Frontend Development With Vue.js</span>
                                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                        <ul class="sub-category is-hidden">
                                            <li class="go-back-menu">
                                                <a href="#"><i class="fas fa-angle-left"></i> Menu</a>
                                            </li>
                                            <li class="go-back">
                                                <a href="#">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="icon"><i class="fab fa-500px"></i></span>
                                                    Frontend Development With Vue.js
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="all-category-devided">
                                        <a href="{{ route('courses') }}">
                                            <span class="icon"><i class="fa fa-align-justify"></i></span>
                                            <span>All courses</span>
                                        </a>
                                    </li>
                                    <li class="all-category-devided">
                                        <a href="{{ route('buscar.ingeniero') }}">
                                            <span class="icon"><i class="fas fa-id-card"></i></span>
                                            <span>Búsqueda Ingeniero CIP</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <div class="mobile-menu-helper-bottom"></div>
                        </ul>
                    </div>

                    <!-- =====================================
                    Buscador
                    ====================================== -->
                    <form class="inline-form" action="{{ route('courses') }}" method="GET" style="width: 100%;">
                        <div class="input-group search-box mobile-search">
                            <input type="text" name="query" class="form-control" placeholder="Search for courses" value="{{ request('query') }}">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- =====================================
                    Acceso rápido a Búsqueda CIP
                    ====================================== -->
                    <div class="instructor-box menu-icon-box d-none d-xl-block">
                        <div class="icon">
                            <a href="{{ route('buscar.ingeniero') }}" style="border: 1px solid transparent; margin: 10px 6px; font-size: 13px; width: 100%; border-radius: 4px; min-width: 110px;">
                                <i class="fas fa-id-card text-primary"></i> Validar CIP
                            </a>
                        </div>
                    </div>

                    <!-- =====================================
                    Shopping Cart
                    ====================================== -->
                    <div class="cart-box menu-icon-box" id="cart_items">
                        <div class="icon">
                            <a href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <span class="number">1</span>
                        </div>

                        <div class="dropdown course-list-dropdown corner-triangle top-right">
                            <div class="list-wrapper">
                                <div class="item-list">
                                    <ul>
                                        <li>
                                            <div class="item clearfix">
                                                <div class="item-image">
                                                    <a href="{{ route('course.detail') }}">
                                                        <img src="{{ asset('assets/img/course_thumbnail_default_12.jpg') }}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="item-details">
                                                    <a href="{{ route('course.detail') }}">
                                                        <div class="course-name">WordPress Theme Development with Bootstrap</div>
                                                        <div class="instructor-name">John Doe</div>
                                                        <div class="item-price">
                                                            <span class="current-price">$10</span>
                                                            <span class="original-price">$11.99</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-footer">
                                    <div class="cart-total-price clearfix">
                                        <span>Total:</span>
                                        <div class="float-right">
                                            <span class="current-price">$10</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('cart') }}">Go to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="signin-box-move-desktop-helper"></span>

                    @if(auth()->check() || !empty($isLoggedIn))
                        @php
                            $currentUser = auth()->user();
                        @endphp
                        <div class="instructor-box menu-icon-box">
                            <div class="icon">
                                <a href="{{ route('my.courses') }}" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0; min-width: 100px;">My courses</a>
                            </div>
                        </div>

                        <div class="user-profile-box">
                            <ul class="list-unstyled topbar-right-menu float-end mb-0">
                                <li class="dropdown notification-list">
                                    <a class="me-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="account-user-avatar">
                                            <img src="{{ asset('assets/img/' . ($currentUser?->avatar ?? 'student3.jpg')) }}" alt="User" class="rounded-circle" style="width: 40px; height: 40px;">
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                        <div class="dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome {{ $currentUser?->name ?? 'Signe Thompson' }}!</h6>
                                        </div>
                                        @if($currentUser?->role === 'admin')
                                            <a href="{{ route('cms.dashboard') }}" class="dropdown-item notify-item">
                                                <i class="fas fa-tachometer-alt mr-2"></i>
                                                <span>Panel CMS</span>
                                            </a>
                                        @endif
                                        <a href="{{ route('my.account') }}" class="dropdown-item notify-item">
                                            <i class="fas fa-user-circle mr-2"></i>
                                            <span>My account</span>
                                        </a>
                                        <a href="{{ route('my.courses') }}" class="dropdown-item notify-item">
                                            <i class="fas fa-book-open mr-2"></i>
                                            <span>My courses</span>
                                        </a>
                                        <a href="{{ route('lessons') }}" class="dropdown-item notify-item">
                                            <i class="fas fa-play-circle mr-2"></i>
                                            <span>Lessons player</span>
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item notify-item w-100 text-left border-0 bg-transparent" style="cursor: pointer;">
                                                <i class="fas fa-sign-out-alt mr-2"></i>
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="sign-in-box btn-group">
                            <a href="{{ route('login') }}" class="btn btn-sign-in">Log in</a>
                            <a href="{{ route('register') }}" class="btn btn-sign-up">Sign up</a>
                        </div>
                    @endif

                </nav>
            </div>
        </div>
    </div>
</section>
