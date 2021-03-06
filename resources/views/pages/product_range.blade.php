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
        'withBack' => true
    ])

    @if ($product_ranges->count() > 0)
        @include('layouts.partials.header.categories', ['hide' => true])
    @endif
@endsection

{{-- Content --}}
@section('content')
<section id="product-list">
    <div class="container d-flex d-md-block" id="list-row">
        {{--Saisie libre --}}
        @include('layouts.partials.product.line', [
            'image' => asset('img/homepage/question.png'),
            'category_icon' => null,
            'category_name' => null,
            'name' => "Saisie libre",
            'reference' => "",
            'model' => "",
            'code' => "",
            'location' => "",
            'description' => "Votre matériel ne se trouve pas dans la liste ? Choisissez cette option et indiquez le matériel concerné",
            'short_description' => "",
            'hasMaterial'=>false
        ])
        @foreach ($materials as $material)
            @include('layouts.partials.product.line', [
                'image' => $material->image ?? asset('img/product/image_not_available.png'),
                'category_icon' => $material->productRanges->pictogram ?? null,
                'product_range' => $material->productRanges->name,
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
                'striked_price' => $material->discount ? $material->price : null,
                'price' => $material->amountHTAfterDiscount,
                'discount' => $material->discount,
                'isFavorite' => $material->isUserFavorite,
                'hasMaterial'=>true
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
