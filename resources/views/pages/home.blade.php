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
            <div class="col-md-5 col-8 offset-1 offset-md-3">
                <span class="message">Bonjour, c'est la grande forme aujourd'hui ?</span>
            </div>
            <div class="col-md-1 col-2">
                <i class="far fa-smile-wink fa-2x mt-2"></i>
            </div>
        </div>

        <img src="{{ asset('img/homepage/caroussel/logo-transparent.png') }}" class="logo d-none d-lg-block">

        <a id="search" href="{{ route('product.search',['fromMenu'=>'0']) }}" class="col-lg-5 p-0 d-block d-lg-none valign-middle mt-4">
            <div class="searchbar">
                <i class="fas fa-search fa-lg"></i>
                <span>Vous recherchez : <span class="search-type">un produit, une marque ?</span></span>
                <i class="fas fa-search fa-lg float-right mr-2"></i>
            </div>
        </a>

        <div class="owl-carousel owl-theme mt-4" data-loop="true" data-dots="false" data-nav="true" data-sm="1" data-md="1" data-autoplay="true" data-margin="30">
            <div>
                <img src="{{ asset('img/homepage/caroussel/slideshow-1.png') }}">
            </div>
            <div>
                <img src="{{ asset('img/homepage/caroussel/slideshow-1.png') }}">
            </div>
            <div>
                <img src="{{ asset('img/homepage/caroussel/slideshow-1.png') }}">
            </div>
        </div>
    </div>
</section>

<section id="emphase">
    <div class="container pb-4">
        <div class="row">
            <div class="col-12  px-5">
                <p class="h3 mb-0">PRODICE, votre service de produits d’entretien</p>
                <div class="d-inline-block position-relative" id="dash"></div>
            </div>
            <div class="col-12  px-5">
                <p class="emphase-text ">
                    Tous les produits d’entretien pour vos appareils de cuisines professionnelles.
                    Découvrez nos gammes de produits adaptés à tous vos équipements : 
                    Four, Lave-vaisselle, Machine à capot, lave-verres...
                </p>
                <p class="emphase-text">
                    Prenez soin de vos équipements et prolongez leur durée de vie avec les
                    produits de nettoyage, rinçage & anticalcaire dédiés. 
                </p>
            </div>
        </div>
    </div>
</section>

@if($agent->isMobile())
    {{-- Categories --}}
    @include('layouts.partials.header.categories', ['linkToBrands' => true])
@endif
<section id="reasurrance" class="d-flex justify-content-center valign-middle">
    <div class="row py-4 d-flex d-md-none">
            <div class="col-4  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="48px" height="48px" src="{{ asset('img/homepage/question.png') }}">
            </div>
            <div class="col-8 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-2">Service client</div>
                <div class="second_line line">  
                    <span class="w-100 d-inline-block">07 86 10 13 46</span>
                    <a class="w-100 d-inline-block" href="mailto:e-commerce@prodice.net">e-commerce@prodice.net</a>
                </div>
            </div>
            <div class="col-4  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="48px" height="48px" src="{{ asset('img/homepage/truck.png') }}">
            </div>
            <div class="col-8 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-1">Livraison 48 H</div>
                <div class="second_line line">& gratuite dès 500€*</div>
                <div class="second_line line"></div>
            </div>
            <div class="col-4  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="48px" height="48px" src="{{ asset('img/homepage/shield.png') }}">
            </div>
            <div class="col-8 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-1">Paiement sécurisé</div>
                <div class="second_line line">Devis rapides</div>
                <div class="second_line line"></div>
            </div>
    </div>
    <div class='d-none d-md-block container'>
        <div class="row py-4 d-flex">
            <div class="col-1  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="60px" height="60px" src="{{ asset('img/homepage/question.png') }}">
            </div>
            <div class="col-3 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-2">Service client</div>
                <div class="second_line line">  
                    <span class="w-100 d-inline-block">07 86 10 13 46</span>
                    <a class="w-100 d-inline-block" href="mailto:e-commerce@prodice.net">e-commerce@prodice.net</a>
                </div>
            </div>
            <div class="col-1  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="60px" height="60px" src="{{ asset('img/homepage/truck.png') }}">
            </div>
            <div class="col-3 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-1">Livraison 48 H</div>
                <div class="second_line line">& gratuite dès 500€*</div>
                <div class="second_line line"></div>
            </div>
            <div class="col-1  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="60px" height="60px" src="{{ asset('img/homepage/shield.png') }}">
            </div>
            <div class="col-3 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-1">Paiement sécurisé</div>
                <div class="second_line line">Devis rapides</div>
                <div class="second_line line"></div>
            </div>
        </div>
    </div>
</section>

{{-- Selection --}}
@include('layouts.partials.selection.main')

<section id="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <img src="{{ asset('img/layout/logo-prodice-lite-dark.png') }}">
                    <span>Nos partenaires</span>
                    <small>fournisseurs</small>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme" data-loop="true" data-dots="false" data-xs="2" data-md="5" data-autoplay="false" data-margin="30">
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
    <div class="d-md-none">
        {{-- Menu bottom --}}
        @include('layouts.partials.footer.mobile')
    </div>
@endsection