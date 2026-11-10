<!DOCTYPE html>
<html lang="es">
    <head>
        <title>@yield('title', 'Plataforma de Educación Online | Academia CIP')</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link name="favicon" type="image/x-icon" href="{{ asset('assets/img/icons/favicon.png') }}" rel="shortcut icon">
        <link rel="favicon" href="{{ asset('assets/img/icons/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/icons/icon.png') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.webui-popover.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.nestable.min.css') }}">
        @stack('styles')
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    </head>

    <body class="gray-bg">

        @include('partials.menu')

        @yield('content')

        @include('partials.footer')

        <!--=====================================
        Scripts (Optimizados: sin doble carga de jQuery)
        ======================================-->
        <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/multi-step-modal.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.webui-popover.min.js') }}"></script>
        <script src="{{ asset('assets/js/O7BMTay5.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nestable.min.js') }}" charset="utf-8"></script>
        <script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        @stack('scripts')

    </body>
</html>
