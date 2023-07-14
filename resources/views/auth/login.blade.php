@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-xxl-4 col-lg-5">
        <div class="card">

            <!-- Logo -->
            <div class="card-header pt-4 pb-4 text-center bg-primary">
                <a href="/home">
                    <span><img src="{{ asset('assets/images/logo-light1.png') }}" alt="" height="18"></span>
                </a>
            </div>
            <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Authentification</h4>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="login" class="form-label">Username/Address Email</label>
                        <input class="form-control @error('login') is-invalid @enderror" type="text" name="login"
                            id="login" required="" placeholder="Entrer votre username ou adresse mail" value="{{ old('email') }}"
                            required autocomplete="login" autofocus>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="entrer votre password" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mb-0 text-center">
                        <button class="btn btn-primary" type="submit">Se connecter </button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection
