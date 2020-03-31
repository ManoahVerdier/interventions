@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="reset-password-page" class="h-100"
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
            {{-- Reset password --}}
            <form method="POST" action="{{ route('password.update') }}" class="reset-password-form">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/layout/round-blue.png') }}">

                    <div class="ml-3 flex-fill">
                        <span>Mot de passe perdu</span><br>
                        <small>En définir un nouveau ?</small>
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

                    {{-- Password confirm --}}
                    <div class="d-flex mt-2">
                        <div class="pr-3">
                            <img src="{{ asset('img/login/password.png') }}" width="35">
                        </div>
                        <div class="flex-fill form-group mb-2">
                            <label for="password_confirmation">Mot de passe (confirmation)</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="pb-3">
                        <button type="submit" class="btn btn-warning btn-lg btn-block delete-btn">
                            Réinitialiser
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
