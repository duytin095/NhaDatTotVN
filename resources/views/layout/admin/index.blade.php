<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="csrf_token" value="{{ csrf_token() }}" /> --}}

    <!-- Title -->
    <title>Nha Dat Tot VN</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/style.css') }}" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bs-select/bs-select.css') }}" />

    <!-- Uploader CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/dropzone/dropzone.min.css') }}" />

    <!-- Add the Leaflet library -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!-- Mega Menu -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/megamenu/css/megamenu.css') }}">

    <!-- Search Filter JS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/search-filter/search-filter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/search-filter/custom-search-filter.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/dataTables.bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/dataTables.bs4-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/buttons.bs.css') }}">

</head>

<body>
    @yield('auth')
    @if (Auth::guard('admin')->check())
        <div class="page-wrapper">

            @include('layout.admin.sidebar')

            <div class="main-container">

                @include('layout.admin.header')

                <!-- Content wrapper scroll start -->
                <div class="content-wrapper-scroll">

                    <!-- Content wrapper start -->
                    <div class="content-wrapper">

                        <!-- Row start -->
                        @yield('content')
                        <!-- Row end -->

                    </div>
                    <!-- Content wrapper end -->

                    @include('layout.admin.footer')

                </div>
                <!-- Content wrapper scroll end -->

            </div>
            <!-- *************
            ************ Main container end *************
        ************* -->

        </div>
    @endif



    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/admin/js/moment.js') }}"></script>


    <!-- Megamenu JS -->
    <script src="{{ asset('assets/admin/vendor/megamenu/js/megamenu.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/megamenu/js/custom.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/admin/vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <!-- Search Filter JS -->
    <script src="{{ asset('assets/admin/vendor/search-filter/search-filter.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/search-filter/custom-search-filter.js') }}"></script>

    <!-- Rating JS -->
    <script src="{{ asset('assets/admin/vendor/rating/raty.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/rating/raty-custom.js') }}"></script>

    <!-- Apex Charts -->
    {{-- p <script src="{{ asset('assets/admin/vendor/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/apex/custom/home/salesGraph.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/apex/custom/home/ordersGraph.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/apex/custom/home/earningsGraph.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/apex/custom/home/visitorsGraph.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/apex/custom/home/customersGraph.js') }}"></script>
    <scrit src="{{ asset('assets/admin/vendor/apex/custom/home/sparkline.js') }}"></script> --}}

    <!-- Circleful Charts -->
    <script src="{{ asset('assets/admin/vendor/circliful/circliful.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/circliful/circliful.custom.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.min.js') }}"></script>
    <script src=" {{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom Data tables -->
    {{-- <script src="{{ asset('assets/admin/vendor/datatables/custom/custom-datatables.js') }}"></script> --}}

    <!-- Bootstrap Select JS -->
    <script src="{{ asset('assets/admin/vendor/bs-select/bs-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bs-select/bs-select-custom.js') }}"></script>

    <!-- Dropzone JS -->
    <script src="{{ asset('assets/admin/vendor/dropzone/dropzone.min.js') }}"></script>

    <!-- Main Js Required -->
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>

    <!-- Add the Leaflet library (used to import the OpenStreetMap)-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!--Google Maps -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU4Gzc5BpgYWvH7P0hqskwIuRwmr2qX20&libraries=places&loading=async&callback=initMap"></script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
    @stack('scripts')
</body>

</html>
