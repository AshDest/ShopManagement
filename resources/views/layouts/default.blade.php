<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SHOP MANAGER') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Application de gestion d'un super marché" name="description" />
    <meta content="Coderthemes" name="Gracieux Sikuly|Destin Ashuza" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles

</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.partials.sidebar')
        <!-- Left Sidebar End -->



        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                @include('layouts.partials.topbar')
                <!-- end Topbar -->

                <!-- Start Content-->
                @yield('content')
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © G&G - Shopmanager
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>




    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.partials.rightsidebar')

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- third party js -->
    {{-- <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @stack('js')
    @stack('jschart')
    @stack('addprojet_modal')
    @stack('jschart_depense')

    <!-- third party js ends -->
    @livewireScripts
    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>
    <!-- end demo js-->
</body>

</html>
