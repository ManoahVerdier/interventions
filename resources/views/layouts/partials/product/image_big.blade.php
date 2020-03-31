<div class="product big">
    <a href="" class="close"><i class="fas fa-times"></i></a>
    <a href="" class="favorite @if ($isFavorite ?? false)active @endif"><i class="@if ($isFavorite ?? false)fas @else far @endif fa-heart fa-lg"></i></a>
    @if ($discount ?? false)<span class="discount">-{{ $discount }}%</span>@endif
    <a href="" class="image">
        <img src="{{ $image }}" class="img-responsive">
    </a>
    <div class="category-icon">
        <img src="{{ $category_icon }}">
    </div>
    <div class="category-name">
        {{ $category_name }}
    </div>
</div>