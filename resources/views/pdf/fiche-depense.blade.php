{{-- @extends('layouts.default')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

</div>
@endsection --}}
<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    @livewire('construction.pdf-fichedepenses', ['projet'=>$projet])
</body>
</html>
