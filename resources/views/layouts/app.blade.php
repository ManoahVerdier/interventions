<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        @laravelPWA
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="page" content="@yield('page')">
        <meta name="choose-site-url" content="{{route('chooseSite')}}">

        @yield('extra-meta')

        <title>@section('title', 'Prodice')</title>

        {{-- CSS --}}
        @section('css')
        {!! Html::style(mix('/css/app.css')) !!}
        @show
    </head>

    <body @yield('body-attr')>
        {{-- Header --}}
        @yield('header')

        {{-- Content --}}
        <main class="content" style="height: calc(100% - 60px)">
            @yield('content')
        </main>

        {{-- Footer --}}
        @yield('footer')

        {{-- JavaScript --}}
        @section('script')
        {!! Html::script(mix('/js/app.js')) !!}
        @show
    </body>
</html>