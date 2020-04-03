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
                            <span class="bold active favorites-count">{{ auth()->user()->favorites->count() }}</span>
                        </span>

                        <a href="" class="flex-fill">
                            <span class="active">
                                {{ trans_choice('site.favorite.adding', auth()->user()->favorites->count())}}
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
                            <span class="bold">5</span>
                        </span>

                        <a href="" class="flex-fill">
                            <span class="">
                                {{ trans_choice('site.favorite.needs', 5)}}
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
        @forelse ($products as $product)
            @include('layouts.partials.product.line', [
                'image' => $product->image ?? asset('img/product/image_not_available.png'),
                'category_icon' => $product->category->pictogram ?? null,
                'category_name' => $product->category->name,
                'name' => $product->name,
                'short_description' => $product->short_description,
                'quantity' => $product->quantity,
                'withBrand' => true,
                'brandImage' => $product->brand->logo ?? null,
                'brandName' => $product->brand->name ?? null,
                'striked_price' => $product->discount ? $product->price : null,
                'price' => $product->priceAfterDiscount,
                'discount' => $product->discount,
                'isFavorite' => $product->isUserFavorite
            ])
        @empty
            <div class="text-danger text-center">{{ __('site.favorite.empty') }}</div>
        @endforelse
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class', 'grey')
@endsection
