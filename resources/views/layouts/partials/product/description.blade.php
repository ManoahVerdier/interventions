<div class="description">
    <a href="{{ route('product') }}" class="product-name">{{ $name }}</a>
    <p class="product-description">{{ $short_description }}</p>

    <div class="quantity">
        <span class="label">Quantité :</span>
        <span class="value">{{ $quantity }}</span>
    </div>

    @if ($withBrand ?? false)
    <div class="logo">
        <img src="{{ $brandImage }}" alt="{{ $brandName }}" class="img-responsive">
    </div>
    @endif

    @if ($withPrice ?? false)
    <div class="price">
        <span class="label">Prix H.T.</span>
        <span class="value">{{ number_format($price, 2, ',', ' ') }} €</span>
        @if (!empty($striked_price))<span class="striked-value">{{ number_format($striked_price, 2, ',', ' ') }} €</span>@endif
    </div>
    @endif

    @if ($withAddToCart ?? false)
        @include('layouts.partials.product.add_to_cart')
    @endif
</div>