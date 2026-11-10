<!-- =====================================
Footer
====================================== -->
<footer class="footer-area d-print-none">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-text">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo-dark.png') }}" alt="Logo" class="d-inline-block" width="110">
                    </a>
                </p>
            </div>

            <div class="col-md-6">
                <ul class="nav justify-content-md-end footer-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buscar.ingeniero') }}">
                            Búsqueda CIP
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('privacy') }}">
                            Privacy policy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('terms') }}">
                            Terms and condition
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
