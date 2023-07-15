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
                            <li class="breadcrumb-item"><a href="{{ route('listconversion') }}">Conversions</a></li>
                            <li class="breadcrumb-item active">Ajouter</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Modifier la Conversion de la Quantité</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @livewire('conversion.edit-conversion', ['conversion' => $conversion])
    </div>
@endsection
