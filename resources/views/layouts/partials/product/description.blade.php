<div class="description">
    <a href="{{ route('product', ['id' => $product->getKey(), 'name' => $product->name]) }}" class="product-name">{{ $name }}</a>
   
    <div class="reference d-md-block">
        <span class="label">Référence :</span>
        <span class="value">{{ $reference }}</span>
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
        @if(($isProductPage ?? false) && $agent->isMobile())
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
    
    
</div>