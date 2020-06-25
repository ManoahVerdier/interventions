@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="register-page" class="h-100"
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
        <div class="col-md-6 pr-5 pt-5 d-none d-md-block">
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

        <div class="col-md-6 pl-md-5 pt-4 pt-md-5 pb-3 pb-md-0" style="background-color: #EFEFEF">
            {{-- Register --}}
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/layout/round-blue.png') }}">

                    <div class="ml-3 flex-fill">
                        <span>Créer un compte</span><br>
                        <small>Nouveau chez Prodice ?</small>
                    </div>

                    <div class="mr-3">
                        <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                    </div>
                </div>

                <div class="pl-2 pr-2">
                    {{-- Company --}}
                    <div class="d-flex mt-4">
                        <div class="pr-3">
                            <img src="{{ asset('img/login/company.png') }}" width="35">
                        </div>
                        <div class="flex-fill form-group">
                            <label for="company">Entreprise</label>
                            <input id="company" type="text" name="company" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" value="{{ old('company') }}" autofocus>

                            @if ($errors->has('company'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Name --}}
                    <div class="d-flex mt-2">
                        <div class="pr-3">
                            <img src="{{ asset('img/login/name.png') }}" width="35">
                        </div>
                        {{-- <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <input id="first_name" type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}">

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div> --}}
                        <div class="flex-fill form-group">
                            <label for="name">Prénom et Nom</label>
                            <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="d-flex mt-2">
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

                    {{-- Password --}}
                    <div class="d-flex mt-2">
                        <div class="pr-3">
                            <img src="{{ asset('img/login/password.png') }}" width="35">
                        </div>
                        <div class="flex-fill form-group mb-2">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Password confirmation --}}
                    <div class="d-flex mt-2">
                        {{-- <div class="pr-3">
                            <img src="{{ asset('img/login/password.png') }}" width="35">
                        </div> --}}
                        <div class="flex-fill form-group mb-2 ml-5">
                            <label for="password_confirmation">Mot de passe (confirmation)</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="d-flex mt-4">
                        <div class="pr-3">
                            <img src="{{ asset('img/login/phone.png') }}" height="35" class="ml-2">
                        </div>
                        <div class="flex-fill form-group">
                            <label for="phone">Téléphone</label>
                            <input id="phone" type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}">

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- CGV --}}
                    <div class="d-flex pl-3 mb-3 align-items-center">
                        <input name="cgv" type="checkbox" value="1" @if (old('cgv'))checked @endif id="cgv-checkbox">
                        <label class="form-check-label cgv ml-2 pt-1" for="cgv-checkbox">
                            J'accepte les <a href="">conditions générales de ventes</a> de Prodice.
                        </label>

                    </div>

                    @if ($errors->has('cgv'))
                    <div class="mb-3 text-center">
                        <span role="alert">
                            <strong class="error">{{ $errors->first('cgv') }}</strong>
                        </span>
                    @endif
                    </div>

                    <div class="pb-3">
                        <button type="submit" class="btn btn-warning btn-lg btn-block delete-btn">
                            Inscription
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
