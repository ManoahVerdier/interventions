<div class="product">
    @if ($discount ?? false)<span class="discount">-{{ $discount }}%</span>@endif
    <a href="{{ route('product', ['id' => $product->getKey(), 'name' => $product->name]) }}">
        <img src="{{ $image }}" class="img-responsive">
    </a>

    @if ($category_icon)
    <div class="category-icon">
        <img src="{{ $category_icon }}">
    </div>
    @endif


    <div class="category-name">
        {{ $brandName }}
    </div>
</div>