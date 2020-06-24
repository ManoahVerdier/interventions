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
        'punchLine' => 'Quel produit<br>recherchez-vous ?'
    ])

    {{-- Brands --}}
    @include('layouts.partials.header.brands')
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
    <div class="d-md-none">
        {{-- Menu bottom --}}
        @include('layouts.partials.footer.mobile')
    </div>
@endsection