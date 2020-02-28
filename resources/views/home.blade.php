@extends('layouts.app')

@section('title', 'Aguapassion')

@section('extra-meta')

@append

@section('content')
<div id="slideshow">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <span class="message">Bonjour, c'est la grande forme aujourd'hui ?</span>
            </div>
            <div class="col-md-1">
                <i class="far fa-smile-wink fa-2x mt-2"></i>
            </div>
        </div>
    </div>
</div>

<div id="reasurrance" class="d-flex justify-content-center valign-middle">
    <img src="{{ asset('img/homepage/reasurrance.png') }}">
</div>
@endsection