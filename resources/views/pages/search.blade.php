@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="search-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => 'Ma recherche',
        'subtitle' => '456 produits',
        'withSearch' => true,
        'punchLine' => 'Quel produit<br>recherchez-vous ?'
    ])
    @include('layouts.partials.header.categories')
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
@endsection