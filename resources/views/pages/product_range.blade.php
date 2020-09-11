@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="category-page"
@endsection

{{-- Header --}}
@section('header')
    @php($materialsCount = $materials->count())
    @include('layouts.partials.header.blue', [
        'title' => isset($brand) ? $brand->name : $product_range->name,
        'subtitle' => trans_choice('site.category.products', $materialsCount, ['value' => $materialsCount]),
        'withSearch' => true,
    ])

    @if ($product_ranges->count() > 0)
        @include('layouts.partials.header.categories', ['hide' => true])
    @endif
@endsection

{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container d-flex d-md-block" id="list-row">
        @foreach ($materials as $material)
            @include('layouts.partials.product.line', [
                'image' => $material->image ?? asset('img/product/image_not_available.png'),
                'category_icon' => $material->productRanges->pictogram ?? null,
                'product_range' => $material->productRanges->name,
                'name' => $material->label,
                'reference' => $material->serial,
                'model' => $material->model,
                'location' => $material->location,
                'description' => $material->description,
                'short_description' => $material->short_description,
                'quantity' => $material->quantity,
                'withBrand' => true,
                'brandImage' => $material->brand->logo ?? null,
                'brandName' => $material->brand->name ?? null,
                'striked_price' => $material->discount ? $material->price : null,
                'price' => $material->amountHTAfterDiscount,
                'discount' => $material->discount,
                'isFavorite' => $material->isUserFavorite
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
