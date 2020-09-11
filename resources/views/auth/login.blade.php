@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="login-page" class="h-100"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Connexion',
    ])
@endsection

{{-- Content --}}
@section('content')
<div class="container-fluid h-100">
    <div class="row h-100">

        <div class="col-md-12 pl-md-5 pt-5 pb-sm-5" style="background-color: #EFEFEF">
            {{-- Login --}}
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/layout/round-blue.png') }}">

                    <div class="ml-3 flex-fill">
                        <span>Connexion</span><br>
                    </div>

                    <div class="mr-3">
                        <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                    </div>
                </div>

                <div class="pl-2 pr-2">
                    <div class="d-flex mt-4">
                        <div class="pr-3">
                            <img src="{{ asset('img/layout/name-blue.png') }}" width="35" class="mt-1">
                        </div>
                        <div class="flex-fill form-group mb-2">
                            <label for="password" class="mb-2">Je choisi ma société</label>
                            <select name="societe" class="form-control{{ $errors->has('societe') ? ' is-invalid' : '' }}" required autofocus>
                                <option {{ old('societe') === 'MARTINON' ? 'selected' : '' }} value="interventions">MARTINON</option>
                            </select>
                            @if ($errors->has('societe'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('societe') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="pr-3">
                            <img src="{{ asset('img/layout/smiley.png') }}">
                        </div>
                        <div class="flex-fill form-group">
                            <label for="identity">J'entre mon identifiant</label>
                            <input id="identity" type="text" name="identity" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" placeholder="Adresse email" value="{{ old('email') }}"  >

                            {{-- @if ($errors->has('identity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identity') }}</strong>
                                </span>
                            @endif --}}
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
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
