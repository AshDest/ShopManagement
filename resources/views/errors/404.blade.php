<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SHOP MANAGER') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Application de gestion d'un super marché" name="description" />
    <meta content="Coderthemes" name="Gracieux Sikuly|Destin Ashuza" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="{{ asset('assets/images/logo.png') }}" alt=""
                                        height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>4</h1>
                                <h4 class="text-uppercase text-danger mt-3">Page introuvable</h4>
                                <p class="text-muted mt-3">IIl semble que vous ayez pris un mauvais virage. Ne pas
                                    t'inquiète... ça
                                    Cela arrive aux meilleurs d'entre nous. Voici un
                                    petite astuce qui pourrait vous aider à vous remettre sur la bonne voie.</p>

                                <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Revenir
                                    à l'Acceuil</a>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> © G&D - Shopmanager
    </footer>

    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jul 2022 13:31:42 GMT -->

</html>
