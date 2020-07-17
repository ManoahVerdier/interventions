@extends('layouts.app')

@section('title', 'Prodice')

@section('page', 'cart')

@section('extra-meta')
<meta name="cart-update-url" content="{{ route('cart.update') }}">
<meta name="cart-validate-url" content="{{ route('cart.validate') }}">
<meta name="cart-discount-url" content="{{ route('cart.discount') }}">
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
<section id="discount">
    <div class="container">
        <div class="row pl-2 pr-2">
            {{-- Code --}}
            <div class="col-6 col-md-5 offset-md-2 d-flex">
                <div class="flex-fill form-group">
                    <input id="discount_code" placeholder="Code réduction" type="text" name="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" value="{{ old('code') }}" autofocus>

                        <span class="invalid-feedback" role="alert" id="error_code">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="pb-3 col-6 col-md-3">
                <button id="discount" class="btn btn-warning btn-lg btn-block delete-btn py-1">
                    Appliquer
                </button>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-md-6 offset-md-1">
                <div id="cart-summary-bottom" class="align-items-end justify-content-between">
                    <div class="d-none pt-1 w-100" id="sub-total">
                        <span>Sous-total (<span class="items-count">{{ $totalQuantity }}</span> {{ trans_choice('site.cart.items', $totalQuantity) }}):</span>
                        <div class="amount float-right">
                            <span class="value">{{ number_format($totalPrice, 2, ',', ' ') }} €</span><br>
                        </div>
                    </div>
                    <div class="d-none pt-1 w-100" id="savings">
                        <span>Remise : </span>
                        <div class="amount float-right">
                            <span class="value"></span><br>
                        </div>
                    </div>
                    <div class="d-inline-block pt-1 w-100" id="total">
                        <span>Total (<span class="items-count">{{ $totalQuantity }}</span> {{ trans_choice('site.cart.items', $totalQuantity) }}):</span>
                        <div class="amount float-right">
                            <span class="value">{{ number_format($totalPrice, 2, ',', ' ') }} €</span><br>
                            Prix H.T.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 align-self-end d-flex">
                <a id="order-btn-bottom" class="btn btn-warning btn-lg btn-block align-self-baseline align-self-end">
                    Passer commande
                </a>
            </div>
        </div>
        
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
