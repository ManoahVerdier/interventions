@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="search-results-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Ma recherche',
        'subtitle' => trans_choice('site.category.products', $materialsCount, ['value' => $materialsCount]),
        'withSearch' => true
    ])
@endsection
<?php $test=0;?>
{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container d-flex d-md-block">
        <div class="row">
            @forelse ($materials as $material)
                @include('layouts.partials.product.line', [
                    'image' => $material->image ?? asset('img/product/image_not_available.png'),
                    'category_icon' => $material->productRanges->pictogram ?? null,
                    'category_name' => $material->productRanges->name ?? null,
                    'name' => $material->label,
                    'reference' => $material->serial,
                    'model' => $material->model,
                    'code' => $material->product_code,
                    'location' => $material->location,
                    'description' => $material->description,
                    'short_description' => $material->short_description,
                    'quantity' => $material->quantity,
                    'withBrand' => true,
                    'brandImage' => $material->brand->logo ?? null,
                    'brandName' => $material->brand->name ?? null,
                    'striked_price' => $material->discount ? $material->amount_ht : null,
                    'price' => $material->amountHTAfterDiscount,
                    'discount' => $material->discount,
                    'isFavorite' => $material->isUserFavorite
                ])
            @empty
                <div class="text-danger text-center">{{ __('site.search.empty') }}</div>
            @endforelse
        </div>
    </div>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])
    @section('footer-class', 'grey')
@endsection
