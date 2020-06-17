@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="product-page"
@endsection

{{-- Header --}}
@section('header')
    @php($productsCount = $product->category->products->count())
    @include('layouts.partials.header.blue', [
        'title' => $product->category->name,
        'subtitle' => trans_choice('site.category.products', $productsCount, ['value' => $productsCount]),
    ])
    @include('layouts.partials.header.sub_header')

    @if ($categories->count() > 0)
        @include('layouts.partials.header.categories', ['hide' => true])
    @endif
@endsection

{{-- Content --}}
@section('content')
<section id="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-2">
                @include('layouts.partials.product.image_big', [
                    'discount' => $product->discount,
                    'image' => $product->image ?? asset('img/product/image_not_available.png'),
                    'category_icon' => $product->category->pictogram ?? null,
                    'category_name' => $product->category->name,
                    'isFavorite' => $product->isUserFavorite,
                ])
            </div>

            <div class="col-md-5">
                @include('layouts.partials.product.description', [
                    'reference' => $product->reference,
                    'name' => $product->name,
                    'short_description' => $product->short_description,
                    'description' => $product->description,
                    'quantity' => $product->quantity,
                    'withPrice' => false,
                    'withBrand' => true,
                    'withAddToCart' => true,
                    'withDescription' => true,
                    'price' => $product->amountHTAfterDiscount,
                    'brandImage' => $product->brand->logo ?? null,
                    'brandName' => $product->brand->name ?? null,
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
