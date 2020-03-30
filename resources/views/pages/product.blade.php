@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="product-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Self Cooking Center',
        'subtitle' => '237 produits',
    ])
    @include('layouts.partials.header.sub_header')
    @include('layouts.partials.header.categories', ['hide' => true])
@endsection

{{-- Content --}}
@section('content')
<section id="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-2">
                @include('layouts.partials.product.image_big', [
                    'discount' => 10,
                    'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?template=withpicto&$image=M_JE20B_S_FR&$picto=ALL_planet&hei=300&wid=300',
                    'category_icon' => asset('img/product/category/four.png'),
                    'category_name' => 'Four',
                    'isFavorite' => true,
                ])
            </div>

            <div class="col-md-5">
                @include('layouts.partials.product.description', [
                    'name' => 'Tablette de nettoyage',
                    'short_description' => 'Self Cooking Center',
                    'quantity' => '100 Tabs',
                    'withPrice' => false,
                    'withBrand' => true,
                    'withAddToCart' => true,
                    'price' => 42.60,
                    'brandImage' => asset('img/partner/rational.png'),
                    'brandName' => 'Rational'
                ])
            </div>
        </div>
    </div>
</section>

{{-- Selection --}}
@include('layouts.partials.selection.main')
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class')
    grey
    @endsection
@endsection
