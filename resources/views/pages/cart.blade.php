@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="cart-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Mon panier',
        'withCartSummary' => true
    ])
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
            'remove' => true
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
            'remove' => true
        ])
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class', 'grey')
@endsection
