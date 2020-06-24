<div class="description">
    <a href="{{ route('product', ['id' => $product->getKey(), 'name' => $product->name]) }}" class="product-name">{{ $name }}</a>

    {{-- Price on mobile product page--}}
    @if($isProductPage ?? false)
        <div class="price">
            @if (!empty($striked_price))<span class="striked-value">{{ number_format($striked_price, 2, ',', ' ') }} €</span>@endif
            <span class="value">{{ number_format($price, 2, ',', ' ') }} €</span>
            <span class="label">Prix H.T.</span>
        </div>
    @endif
    
    <p class="product-description d-none d-md-inline">{{ $short_description }}</p>

    @if($withBrand ?? false)
        <div class="logo my-0 d-block d-md-none">
            <p>{{ $brandName }}</p>
        </div>
    @endif
   
    <div class="reference d-none d-md-block">
        <span class="label">Référence :</span>
        <span class="value">{{ $reference }}</span>
    </div>

    <div class="quantity">
        <span class="label">Quantité :</span>
        <span class="value">{{ $quantity }}</span>
    </div>

    @if ($withBrand ?? false)
    <div class="logo d-none d-md-block">
        @if ($brandImage)
        <img src="{{ $brandImage }}" alt="{{ $brandName }}" class="img-responsive">
        @else
        <b>{{ $brandName }}</b>
        @endif
    </div>
    @endif

    @if ($withDescription ?? false)
        @if($isProductPage ?? false)
        <div class='description-wrap mt-3'>
            <a class="toggle-description mt-0 d-flex" data-toggle="collapse" href="#collapseDescription" role="button" aria-expanded="false" aria-controls="collapseDescription">
                <div class="ml-3 flex-fill">
                    Description
                </div>
                <div class="mr-3 chevron">
                    <img src="http://homestead.test/img/layout/chevron-right.png">
                </div>

                <div class="collapse" id="collapseDescription">
                
            </a>
            <p class="product-description">
                    {!! nl2br($description) !!}
            </p>
        </div>
        @else
        <p class="product-description">
            {!! nl2br($description) !!}
        </p>
        @endif
    @endif

    @if ($withPrice ?? false)
    <div class="price">
        <span class="label">Prix H.T.</span>
        <span class="value">{{ number_format($price, 2, ',', ' ') }} €</span>
        @if (!empty($striked_price))<span class="striked-value">{{ number_format($striked_price, 2, ',', ' ') }} €</span>@endif
    </div>
    @endif
    
    {{-- Price on list and desktop--}}
    @if(!$agent->isMobile() || ! ($isProductPage ?? false))
        @if ($withAddToCart ?? false)
            @include('layouts.partials.product.add_to_cart')
        @endif
    @endif
</div>