@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="product-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.homepage')
@endsection

{{-- Content --}}
@section('content')
<section id="intervention" class="px-3 py-5">
    <div class="container">
        <form class="row" method="POST">
            <div class="col-12 text-white mb-4">
                <h1 class="h4 text-center">Demande d'intervention</h1>
                <h2 class="h6 text-center">{{$product->name}}</h2>
            </div>
            <div class="form-group col-12 text-white">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description">Description du problème...</textarea>
                <small id="descHelp" class="form-text text-white">Merci de décrire aussi précisement que possible le problème rencontré</small>
            </div>
            <div class="form-group col-12 text-white">
                <label for="gravite">Gravité</label>
                <select class="form-control" name="gravite">
                    <option>Gravité...</option>
                    <option value="Fonctionnel">Fonctionnel</option>
                    <option value="Bloquant">Bloquant</option>
                    <option value="Urgent">Urgent</option>
                </select>
            </div>
            <div class="form-group col-12 text-white">
                <label for="image">Joindre une image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <div class="form-group col-12 mt-4">
                <input class="form-control btn btn-secondary" type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</section>
{{--
<section id="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-2">
                @include('layouts.partials.product.image_big', [
                    'discount' => $product->discount,
                    'image' => $product->image ?? asset('img/product/image_not_available.png'),
                    'category_icon' => $product->category->pictogram ?? null,
                    'category_name' => $product->category->name,
                    'isFavorite' => $product->isUserFavorite,
                    'withAddToCart' => true,
                    'price' => $product->amountHTAfterDiscount,
                ])
            </div>

            <div class="col-md-5">
                @include('layouts.partials.product.description', [
                    'reference' => $product->reference,
                    'name' => $product->name,
                    'short_description' => $product->short_description,
                    'description' => $product->description,
                    'quantity' => $product->quantity,
                    'withPrice' => false,
                    'withBrand' => true,
                    'withAddToCart' => true,
                    'withDescription' => true,
                    'price' => $product->amountHTAfterDiscount,
                    'brandImage' => $product->brand->logo ?? null,
                    'brandName' => $product->brand->name ?? null,
                    'isProductPage' => true,
                ])
            </div>
        </div>
    </div>
</section>
--}}
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])
    @section('footer-class')
    grey
    @endsection
@endsection
