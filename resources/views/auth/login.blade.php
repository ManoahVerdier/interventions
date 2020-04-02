@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="login-page" class="h-100"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Mon compte',
    ])
@endsection

{{-- Content --}}
@section('content')
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-md-6 pr-5 pt-5">
            {{-- Register --}}
            <a href="{{ route('register') }}" class="register-link float-right d-flex align-items-center">
                <img src="{{ asset('img/layout/round.png') }}">
                <div class="ml-3 flex-fill">
                    <span>Créer un compte</span><br>
                    <small>Nouveau chez Prodice ?</small>
                </div>
                <div class="mr-3">
                    <img src="{{ asset('img/layout/chevron-right.png') }}">
                </div>
            </a>
        </div>

        <div class="col-md-6 pl-5 pt-5" style="background-color: #EFEFEF">
            {{-- Login --}}
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/layout/round-blue.png') }}">

                    <div class="ml-3 flex-fill">
                        <span>Connexion</span><br>
                        <small>Déjà client(e) ?</small>
                    </div>

                    <div class="mr-3">
                        <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                    </div>
                </div>

                <div class="pl-2 pr-2">
                    <div class="d-flex mt-4">
                        <div class="pr-3">
                            <img src="{{ asset('img/layout/smiley.png') }}">
                        </div>
                        <div class="flex-fill form-group">
                            <label for="identity">J'entre mon identifiant</label>
                            <input id="identity" type="text" name="identity" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" placeholder="Adresse email" value="{{ old('email') }}"  autofocus>

                            @if ($errors->has('identity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identity') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex mt-2">
                        <div class="pr-3">
                            <img src="{{ asset('img/layout/parapluie.png') }}" width="35">
                        </div>
                        <div class="flex-fill form-group mb-2">
                            <label for="password">J'entre mon mot de passe</label>
                            <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="pb-3 d-flex justify-content-end">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <div class="pb-3">
                        <button type="submit" class="btn btn-warning btn-lg btn-block delete-btn">
                            Connexion
                        </button>
                    </div>

                    <div class="pb-3">
                        <span class="cgv">Lorsque vous vous inscrivez, vous acceptez les <a href="">conditions générales de ventes</a> de Prodice.</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
