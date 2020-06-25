@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="profile-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Mon compte'
    ])
@endsection

{{-- Content --}}
@section('content')
{{-- Register --}}


<form method="POST" action="{{ route('profile') }}" class="profile-form mt-4 mb-5">
    @csrf
    <div class="d-flex align-items-center">
        <img src="{{ asset('img/layout/round-blue.png') }}">

        <div class="ml-3 flex-fill">
            <span>Paramètres du compte</span><br>
            <small>Prodice</small>
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
                <input id="company" type="text" name="company" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" value="{{ old('company') ?? $user->company}}" autofocus>

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
                <input id="first_name" type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ $user->name }}">

                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div> --}}
            <div class="flex-fill form-group">
                <label for="name">Prénom et Nom</label>
                <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? $user->name}}">

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
                <input id="email" type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?? $user->email}}">

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
                <input id="phone" type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') ?? $user->phone}}">

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="pb-3">
            <button type="submit" class="btn btn-warning btn-lg btn-block delete-btn">
                Sauvegarder
            </button>
        </div>
    </div>
</form>
@endsection


{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])
    <div class="d-md-none">
        {{-- Menu bottom --}}
        @include('layouts.partials.footer.mobile')
    </div>
    @section('footer-class')
    grey
    @endsection
@endsection
