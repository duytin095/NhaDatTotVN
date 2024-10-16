<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Link of CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/scrollCue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}">

    <!-- Uploader CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/dropzone/dropzone.min.css') }}" />

    <title>Nhà đất tốt VN</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/user/images/favicon.png') }}">
</head>

<body>
    <!-- Start Preloader Area -->
    {{-- <div class="preloader-area text-center position-fixed top-0 bottom-0 start-0 end-0" id="preloader">
            <div class="loader position-absolute start-0 end-0">
                <img src="assets/images/favicon.png" alt="favicon">
                <div class="waviy position-relative">
                    <span class="d-inline-block">A</span>
                    <span class="d-inline-block">N</span>
                    <span class="d-inline-block">D</span>
                    <span class="d-inline-block">O</span>
                    <span class="d-inline-block">R</span>
                    <span class="d-inline-block">A</span>
                </div>
            </div>
        </div> --}}
    <!-- End Preloader Area -->

    @include('layout.user.header')
    @include('layout.user.nav-bar')


    @include('layout.user.nav-bar-res')


    @yield('auth')
    @if (Auth::guard('users')->check())
    @endif
    @yield('content')
    @yield('home')
    @include('layout.user.footer')

    <!-- Back to Top -->
    <button type="button" id="back-to-top" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-s-line"></i>
    </button>



    <script src="{{ asset('assets/user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/scrollCue.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/fslightbox.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/simpleParallax.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/main.js') }}"></script>

     <!-- Dropzone JS -->
     <script src="{{ asset('assets/admin/vendor/dropzone/dropzone.min.js') }}"></script>


    <!--Google Maps -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU4Gzc5BpgYWvH7P0hqskwIuRwmr2qX20&libraries=places&loading=async&callback=initMap"></script>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2-custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
