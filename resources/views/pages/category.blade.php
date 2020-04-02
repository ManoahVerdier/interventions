@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="category-page"
@endsection

{{-- Header --}}
@section('header')
    @php($productsCount = $category->products->count())
    @include('layouts.partials.header.blue', [
        'title' => $category->name,
        'subtitle' => trans_choice('category.products', $productsCount, ['value' => $productsCount]),
    ])
    @include('layouts.partials.header.sub_header')

    @if ($categories->count() > 0)
        @include('layouts.partials.header.categories', ['hide' => true])
    @endif
@endsection

{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container">
        @foreach ($products as $product)
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
        @endforeach
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class', 'grey')
@endsection
