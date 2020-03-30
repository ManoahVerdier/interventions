@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="favorites-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Favoris',
        'subtitle' => 'liés à ma gamme de produits',
    ])

    <nav class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-2">
                    <div class="d-flex">
                        <span>
                            <span class="bold">1</span>
                        </span>

                        <a href="" class="flex-fill">
                            <span>
                                Ajout
                            </span>
                        </a>

                        <div>
                            <img src="{{ asset('img/layout/chevron-right.png') }}">
                        </div>
                    </div>
                </div>

                <div class="col-1 d-flex justify-content-center">
                    <div class="separator"></div>
                </div>

                <div class="col-4">
                    <div class="d-flex">
                        <span>
                            <span class="active">5</span>
                        </span>

                        <a href="" class="flex-fill">
                            <span class="active">
                                Besoins
                            </span>
                        </a>

                        <div>
                            <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container">
        @include('layouts.partials.product.line', [
            'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?template=withpicto&$image=M_JE20B_S_FR&$picto=ALL_planet&hei=300&wid=300',
            'category_icon' => asset('img/product/category/four.png'),
            'category_name' => 'Four',
            'name' => 'Tablette de nettoyage',
            'short_description' => 'Self Cooking Center',
            'quantity' => '100 Tabs',
            'withBrand' => true,
            'brandImage' => asset('img/partner/rational.png'),
            'brandName' => 'Rational',
            'price' => 42.60,
            'isFavorite' => true,
        ])

        @include('layouts.partials.product.line', [
            'discount' => 10,
            'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?image=M_JE10N_S_FR$default$',
            'category_icon' => asset('img/product/category/four.png'),
            'category_name' => 'Vaisselle',
            'name' => 'Tablette d\'entretien',
            'short_description' => 'Self Cooking Center',
            'quantity' => '12 kg',
            'withBrand' => true,
            'brandImage' => asset('img/partner/unox.png'),
            'brandName' => 'Unox',
            'striked_price' => 38.25,
            'price' => 35.25,
            'isFavorite' => true,
        ])
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class', 'grey')
@endsection
