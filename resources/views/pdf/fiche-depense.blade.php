{{-- @extends('layouts.default')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

</div>
@endsection --}}
<!DOCTYPE html>
<html>
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
    @livewireStyles
</head>
<body  >
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->



        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <!-- end Topbar -->
                <div class="container-fluid">
                <!-- Start Content-->
                @livewire('construction.pdf-fichedepenses', ['projet'=>$projet])
                <!-- container -->
                </div>

            </div>
            <!-- content -->

            {{-- <!-- Footer Start -->
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
            <!-- end Footer --> --}}

        </div>
    </div>
    <!-- END wrapper -->
    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- third party js ends -->
    @livewireScripts
    <!-- demo app -->
    <!-- end demo js-->
</body>
<body>

</body>
</html>
