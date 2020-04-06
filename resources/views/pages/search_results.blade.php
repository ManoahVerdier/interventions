@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="search-results-page"
@endsection

{{-- Header --}}
@section('header')
    @php($productsCount = 1)
    @include('layouts.partials.header.blue', [
        'title' => 'Ma recherche',
        // 'subtitle' => trans_choice('site.category.products', $productsCount, ['value' => $productsCount]),
        'withSearch' => true
    ])
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
            <div class="text-danger text-center">{{ __('site.search.empty') }}</div>
        @endforelse
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class', 'grey')
@endsection