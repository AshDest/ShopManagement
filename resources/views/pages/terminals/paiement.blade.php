@extends('layouts.default_terminal')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">LISTE DE DETTES et DES PAIEMENTS</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<!-- Start Content-->
@livewire('terminal.paiements')
<!-- container -->
@endsection
