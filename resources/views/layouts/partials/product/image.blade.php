<div class="product">
    @if ($discount ?? false)<span class="discount">-{{ $discount }}%</span>@endif
    <a href="{{ route('material', ['id' => $material->getKey(), 'name' => $material->label]) }}">
        <img 
            src="{{Config::get('filesystems.distant_img_roots.'.Config::get('filesystems.distant_img_root_default')).$image }}" 
            class="img-responsive"
        >
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