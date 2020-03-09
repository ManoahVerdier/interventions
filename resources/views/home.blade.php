@extends('layouts.app')

@section('title', 'Aguapassion')

@section('extra-meta')

@append

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

<section id="selection">
    <div class="container">
        {{-- Title --}}
        <div class="row">
            <div class="col-10">
                <h2>
                    <img src="{{ asset('img/layout/chevron-bottom.png') }}">
                    <span>Notre sélection</span>
                    <small class="primary-text">du moment</small>
                </h2>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-outline-secondary float-right">Voir +</button>
            </div>
        </div>

        {{-- Products --}}
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme" data-loop="true">
                    <div>
                        <div class="item">
                            <a href="" class="favorite"><i class="far fa-heart fa-lg"></i></a>
                            <span class="discount">-10%</span>
                            <img src="https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?template=withpicto&$image=M_JE20B_S_FR&$picto=ALL_planet&hei=300&wid=300" class="img-responsive">
                            <div class="category-icon">
                                <img src="{{ asset('img/product/category/four.png') }}">
                            </div>
                            <div class="category-name">
                                Four
                            </div>
                        </div>

                        <div class="description">
                            <a href="" class="product-name">Tablette de nettoyage</a>
                            <p class="product-description">Self Cooking Center</p>

                            <div class="quantity">
                                <span class="label">Quantité :</span>
                                <span class="value">100 Tabs</span>
                            </div>

                            <div class="price">
                                <span class="label">Prix H.T.</span>
                                <span class="value">42,60 €</span>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class="item">
                            <a href="" class="favorite"><i class="far fa-heart fa-lg"></i></a>
                            <img src="https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?image=M_JE10N_S_FR$default$" class="img-responsive">
                            <div class="category-icon">
                                <img src="{{ asset('img/product/category/four.png') }}">
                            </div>
                            <div class="category-name">
                                Vaisselle
                            </div>
                        </div>

                        <div class="description">
                            <a href="" class="product-name">F420E - Détergent</a>
                            <p class="product-description">Self Cooking Center</p>

                            <div class="quantity">
                                <span class="label">Quantité :</span>
                                <span class="value">12 kg</span>
                            </div>

                            <div class="price">
                                <span class="label">Prix H.T.</span>
                                <span class="value">38,25 €</span>
                                <span class="striked-value">35,25 €</span>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>

    </div>
</section>

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
    </div>
</section>
@endsection