@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="search-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.search')
    @include('layouts.partials.header.categories')
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
@endsection