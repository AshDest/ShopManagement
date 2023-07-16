@extends('layouts.default')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listapprovisionnement') }}">Ajouter</a></li>
                            <li class="breadcrumb-item active">Ajouter Approvisionnement</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ajouter un Approvisionnement</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @livewire('approvisionnement.add-approvs', ['ids' => $ids])
    </div>
@endsection
