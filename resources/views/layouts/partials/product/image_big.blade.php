<div class="product big">
    <a class="close close-product d-block d-md-none" href="{{ url()->previous() }}"><i class="fa fa-times"></i></a>
    <a href="{{ route('favorites.toggle', $product->getKey()) }}" class="favorite toggle-favorite @if ($isFavorite ?? false)active @endif">
        <i class="far fa-heart fa-lg is-not-favorite" @if ($isFavorite)style="display: none"@endif></i>
        <i class="fas fa-heart fa-lg is-favorite" @if (!$isFavorite)style="display: none"@endif></i>
    </a>
    @if ($discount ?? false)<span class="discount">-{{ $discount }}%</span>@endif
    <div class="image">
        <img src="{{ $image }}" class="img-responsive">
    </div>

    @if ($category_icon)
    <div class="category-icon">
        <img src="{{ $category_icon }}">
    </div>
    @endif

    <div class="category-name">
        {{ $category_name }}
    </div>

    @if($agent->isMobile())
        @if ($withAddToCart ?? false)
            @include('layouts.partials.product.add_to_cart_mobile')
        @endif
    @endif
</div>