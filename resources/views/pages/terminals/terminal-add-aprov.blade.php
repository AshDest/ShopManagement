@extends('layouts.default_terminal')
@section('content')
      <!-- Start Content-->
      <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('vente') }}">Vente</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listeproduitterminal') }}">Liste produits</a></li>
                            <li class="breadcrumb-item active">Ajouter Approvisionnement</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ajouter un Approvisionnement</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @livewire('terminal.add-aprov-terminal', ['ids' => $ids])
    </div>
@endsection
