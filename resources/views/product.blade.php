@extends('layouts.app')

@section('title', 'Prodice')

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.category')

    <nav class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1">
                    <span class="category-pagination">
                        <span class="active">1</span>
                        <span>/ 3</span>
                    </span>

                    <a href="" class="category">
                        <span>
                            Tablettes de nettoyage
                        </span>

                        <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                    </a>

                </div>
            </div>
        </div>
    </nav>
@endsection

{{-- Content --}}
@section('content')
<section id="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="product">
                    <a href="" class="close"><i class="fas fa-times"></i></a>
                    <a href="" class="favorite"><i class="far fa-heart fa-lg"></i></a>
                    <span class="discount">-10%</span>
                    <a href="" class="image">
                        <img src="https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?template=withpicto&$image=M_JE20B_S_FR&$picto=ALL_planet&hei=300&wid=300" class="img-responsive">
                    </a>
                    <div class="category-icon">
                        <img src="{{ asset('img/product/category/four.png') }}">
                    </div>
                    <div class="category-name">
                        Four
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="description">
                    <a href="" class="product-name">Tablette de nettoyage</a>
                    <p class="product-description">Self Cooking Center</p>

                    <div class="quantity">
                        <span class="label">Quantité :</span>
                        <span class="value">100 Tabs</span>
                    </div>

                    <div class="logo">
                        <img src="{{ asset('img/partner/rational.png') }}" alt="Rational" class="img-responsive">
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="price">
                                <span class="value">42,60 €</span><br>
                                <span class="label">Prix H.T.</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-warning btn-lg btn-block cart-btn">
                                <i class="fas fa-shopping-cart cart-icon"></i>
                                Ajouter au panier
                                <i class="fas fa-plus add-icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Selection --}}
@include('layouts.partials.selection.main')
@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])

    @section('footer-class')
    grey
    @endsection
@endsection
