@extends('layouts.app')

@section('title', 'Prodice')

@section('page', 'cart')

@section('extra-meta')
<meta name="cart-update-url" content="{{ route('cart.update') }}">
<meta name="cart-validate-url" content="{{ route('cart.validate') }}">
@append

@section('body-attr')
id="cart-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Mon panier',
        'withCartSummary' => true,
        'productsCount' => $totalQuantity,
        'totalPrice' => $totalPrice
    ])
@endsection

{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container">
        @forelse ($cartLines as $line)
            @php ($product = $line->product)
            @include('layouts.partials.product.line', [
                'image' => $product->image ?? asset('img/product/image_not_available.png'),
                'category_icon' => $product->category->pictogram ?? null,
                'category_name' => $product->category->name,
                'name' => $product->name,
                'reference' => $product->reference,
                'description' => $product->description,
                'short_description' => $product->short_description,
                'quantity' => $product->quantity,
                'selectedQuantity' => $line->quantity,
                'withBrand' => true,
                'brandImage' => $product->brand->logo ?? null,
                'brandName' => $product->brand->name ?? null,
                'striked_price' => $product->discount ? $product->price * $line->quantity : null,
                'price' => $product->amountHTAfterDiscount * $line->quantity,
                'discount' => $product->discount,
                'isFavorite' => $product->isUserFavorite,
                'remove' => true,
                'isCartPage'=>true,
            ])
        @empty
            <div class="text-danger text-center">{{ __('site.cart.empty') }}</div>
        @endforelse
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])
    <div class="d-md-none">
        {{-- Menu bottom --}}
        @include('layouts.partials.footer.mobile')
    </div>
    @section('footer-class', 'grey')
@endsection
