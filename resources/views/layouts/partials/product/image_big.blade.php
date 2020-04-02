<div class="product big">
    {{-- <a href="" class="close"><i class="fas fa-times"></i></a> --}}
    <a href="" class="favorite @if ($isFavorite ?? false)active @endif"><i class="@if ($isFavorite ?? false)fas @else far @endif fa-heart fa-lg"></i></a>
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