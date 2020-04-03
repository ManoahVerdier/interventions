<div class="product big">
    {{-- <a href="" class="close"><i class="fas fa-times"></i></a> --}}
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
</div>