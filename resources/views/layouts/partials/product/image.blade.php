<div class="product">
    <a href="" class="favorite @if ($isFavorite ?? false)active @endif"><i class="far fa-heart fa-lg"></i></a>
    @if ($discount ?? false)<span class="discount">-{{ $discount }}%</span>@endif
    <a href="{{ route('product') }}">
        <img src="{{ $image }}" class="img-responsive">
    </a>
    <div class="category-icon">
        <img src="{{ $category_icon }}">
    </div>
    <div class="category-name">
        {{ $category_name }}
    </div>
</div>