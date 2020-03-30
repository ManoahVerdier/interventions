@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="home-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.homepage')
@endsection

{{-- Content --}}
@section('content')
<section id="slideshow">
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
</section>

<section id="reasurrance" class="d-flex justify-content-center valign-middle">
    <img src="{{ asset('img/homepage/reasurrance.png') }}">
</section>

{{-- Selection --}}
@include('layouts.partials.selection.main')

<section id="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <img src="{{ asset('img/layout/chevron-bottom.png') }}">
                    <span>Nos partenaires</span>
                    <small>fournisseurs</small>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme" data-loop="true" data-dots="false" data-md="5" data-autoplay="true" data-margin="30">
                    <div class="partner-logo">
                        {{-- <a href="https://www.rational-online.com" target="_blank"><img src="{{ asset('img/partner/rational.png') }}" alt="Rational" class="img-responsive"></a> --}}
                        <img src="{{ asset('img/partner/rational.png') }}" alt="Rational" class="img-responsive">
                    </div>
                    <div class="partner-logo">
                        {{-- <a href="https://www.convotherm.com" target="_blank"><img src="{{ asset('img/partner/convotherm.png') }}" alt="Convotherm" class="img-responsive"></a> --}}
                        <img src="{{ asset('img/partner/convotherm.png') }}" alt="Convotherm" class="img-responsive">
                    </div>
                    <div class="partner-logo">
                        {{-- <a href="https://www.granuldisk.com/fr" target="_blank"><img src="{{ asset('img/partner/granuldisk.png') }}" alt="Granuldisk" class="img-responsive"></a> --}}
                        <img src="{{ asset('img/partner/granuldisk.png') }}" alt="Granuldisk" class="img-responsive">
                    </div>
                    <div class="partner-logo">
                        {{-- <a href="https://www.unox.com/fr_fr" target="_blank"><img src="{{ asset('img/partner/unox.png') }}" alt="Unox" class="img-responsive"></a> --}}
                        <img src="{{ asset('img/partner/unox.png') }}" alt="Unox" class="img-responsive">
                    </div>
                    <div class="partner-logo">
                        {{-- <a href="http://www.franstal.fr" target="_blank"><img src="{{ asset('img/partner/franstal.png') }}" alt="Franstal" class="img-responsive"></a> --}}
                        <img src="{{ asset('img/partner/franstal.png') }}" alt="Franstal" class="img-responsive">
                    </div>
                    <div class="partner-logo">
                        {{-- <a href="https://www.winterhalter.com/fr-fr" target="_blank"><img src="{{ asset('img/partner/winterhalter.png') }}" alt="Winterhalter" class="img-responsive"></a> --}}
                        <img src="{{ asset('img/partner/winterhalter.png') }}" alt="Winterhalter" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
@endsection