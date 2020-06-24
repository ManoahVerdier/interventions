@if($agent->isMobile())
    @if(($isFavoritesPage ?? false)||($isCartPage ?? false))
    <div class="product-line row col-12 col-md-12 mx-0 px-1">
        <div class="col-5 col-md-3 offset-0 offset-md-1 px-0 px-md-3 image-wrap">
            @include('layouts.partials.product.image')
        </div>

        <div class="col-7 col-md-4  px-0 px-md-3">
            @include('layouts.partials.product.description')
            @include('layouts.partials.product.add_to_cart_mobile')
        </div>
    </div>
    @else 
    <div class="product-line col-6 col-md-12 mx-0 px-1">
        <div class="col-md-3 offset-md-1 px-0 px-md-3 image-wrap">
            @include('layouts.partials.product.image')
        </div>

        <div class="col-md-4  px-0 px-md-3">
            @include('layouts.partials.product.description')
        </div>

        <div class="col-md-3  px-0 px-md-3">
            @include('layouts.partials.product.add_to_cart')
        </div>
    </div>
    @endif
@else
<div class="row product-line col-md-12">
    <div class="col-md-3 offset-md-1">
        @include('layouts.partials.product.image')
    </div>

    <div class="col-md-4 b-bordered">
        @include('layouts.partials.product.description')
    </div>

    <div class="col-md-3 b-bordered">
        @include('layouts.partials.product.add_to_cart')
    </div>
</div>
@endif