@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-12 col-lg-5">
            <div class="card">
                <!-- Logo -->
                <div class="card-header pt-4 pb-4 text-center bg-primary">
                    <a>
                        <span><img src="{{ asset('assets/images/logo.png') }}" alt="" height="18"></span>
                    </a>
                </div>
                <div class="card-body p-4">

                    <div class="text-center w-75 m-auto">
                        <h4 class="text-dark-50 text-center pb-0 fw-bold">INFORMATION DE L'ENTREPRISE</h4>
                        <p class="text-muted mb-4">Vuiellez enregistrer les informations necessaires de votre super marche
                        </p>
                    </div>
                    @livewire('parametrage.starters')
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

        </div> <!-- end col -->
    </div>
@endsection
