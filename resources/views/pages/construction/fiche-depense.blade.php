@extends('layouts.default')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    @livewire('construction.pdf-fichedepenses', ['projet'=>$projet])
</div>
@endsection
