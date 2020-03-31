@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="retrieve-password-page" class="h-100"
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
            {{-- Login --}}
            <a href="{{ route('login') }}" class="login-link float-right d-flex align-items-center">
                <img src="{{ asset('img/layout/round.png') }}">
                <div class="ml-3 flex-fill">
                    <span>Connexion</span><br>
                    <small>Déjà client(e) ?</small>
                </div>
                <div class="mr-3">
                    <img src="{{ asset('img/layout/chevron-right.png') }}">
                </div>
            </a>
        </div>

        <div class="col-md-6 pl-5 pt-5" style="background-color: #EFEFEF">
            {{-- Retrieve password --}}
            <form method="POST" action="{{ route('password.email') }}" class="retrieve-password-form">
                @csrf
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/layout/round-blue.png') }}">

                    <div class="ml-3 flex-fill">
                        <span>Mot de passe perdu</span><br>
                        <small>En créer un nouveau ?</small>
                    </div>

                    <div class="mr-3">
                        <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                    </div>
                </div>

                <div class="pl-2 pr-2">
                    {{-- Email --}}
                    <div class="d-flex mt-4">
                        <div class="pr-3">
                            <img src="{{ asset('img/login/email.png') }}" width="35">
                        </div>
                        <div class="flex-fill form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="pb-3">
                        <button type="submit" class="btn btn-warning btn-lg btn-block delete-btn">
                            Envoyer lien de réinitialisation
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
