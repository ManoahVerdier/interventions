@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="search-page"
@endsection


{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Ma recherche',
        'subtitle' => trans_choice('site.category.products', $productsCount, ['value' => $productsCount]),
        'withSearch' => true,
        'punchLine' => $fromMenu?'Quel produit<br>recherchez-vous ?':null
    ])

    {{-- Categories --}}
    @include('layouts.partials.header.categories', ['linkToBrands' => true])
@endsection



{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
@endsection