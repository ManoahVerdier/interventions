@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="category-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.category')
    @include('layouts.partials.header.sub_header')
    @include('layouts.partials.header.categories', ['hide' => true])
@endsection

{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container">
        <div class="row product-line">
            <div class="col-md-3 offset-md-1">
                @include('layouts.partials.product.image', [
                    'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?template=withpicto&$image=M_JE20B_S_FR&$picto=ALL_planet&hei=300&wid=300',
                    'category_icon' => asset('img/product/category/four.png'),
                    'category_name' => 'Four'
                ])
            </div>

            <div class="col-md-4 b-bordered">
                @include('layouts.partials.product.description', [
                    'name' => 'Tablette de nettoyage',
                    'short_description' => 'Self Cooking Center',
                    'quantity' => '100 Tabs',
                    'withBrand' => true,
                    'brandImage' => asset('img/partner/rational.png'),
                    'brandName' => 'Rational'
                ])
            </div>

            <div class="col-md-3 b-bordered">
                @include('layouts.partials.product.add_to_cart', [
                    'price' => 42.60,
                ])
            </div>
        </div>

        <div class="row product-line">
            <div class="col-md-3 offset-md-1">
                @include('layouts.partials.product.image', [
                    'discount' => 10,
                    'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?image=M_JE10N_S_FR$default$',
                    'category_icon' => asset('img/product/category/four.png'),
                    'category_name' => 'Vaisselle'
                ])
            </div>

            <div class="col-md-4 b-bordered">
                @include('layouts.partials.product.description', [
                    'name' => 'Tablette d\'entretien',
                    'short_description' => 'Self Cooking Center',
                    'quantity' => '12 kg',
                    'withBrand' => true,
                    'brandImage' => asset('img/partner/unox.png'),
                    'brandName' => 'Unox'
                ])
            </div>

            <div class="col-md-3 b-bordered">
                @include('layouts.partials.product.add_to_cart', [
                    'striked_price' => 38.25,
                    'price' => 35.25,
                ])
            </div>
        </div>
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class')
    grey
    @endsection
@endsection
