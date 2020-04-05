@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="activation-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.homepage')
@endsection

{{-- Content --}}
@section('content')
<section id="activation">
    <p class="text-center text-danger">
        Votre demande d'inscription a bien été prise en compte.<br>
        Notre équipe activera votre compte dans les plus brefs délais.
    </p>
</section>
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main')
@endsection