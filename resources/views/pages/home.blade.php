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
                    <span class="message">Bonjour, comment puis-je vous aider ?</span>
                </div>
                <div class="col-md-1 col-2">
                    <i class="far fa-smile-wink fa-2x mt-2"></i>
                </div>
            </div>

            <img src="{{ asset('img/homepage/caroussel/logo-transparent.png') }}" class="logo d-none d-lg-block">

            <a id="search" href="{{ route('product.search',['fromMenu'=>'0']) }}" class="col-lg-5 p-0 d-block d-lg-none valign-middle my-4">
                <div class="searchbar">
                    <i class="fas fa-search fa-lg"></i>
                    <span>Vous recherchez : <span class="search-type">par codeP, nom ?</span></span>
                    <i class="fas fa-search fa-lg float-right mr-2"></i>
                </div>
            </a>
            {{--
            <img src="{{ asset('img/homepage/caroussel/slideshow-1.png') }}" class="col-12 mt-3">
            --}}
            {{-- Categories --}}
            @include('layouts.partials.header.categories', ['linkToBrands' => true])
    </section>

@endsection
{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
@endsection