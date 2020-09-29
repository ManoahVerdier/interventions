<div class="product">
    @if($hasMaterial ?? true)
        <a href="{{ route('material', ['id' => $material->getKey(), 'name' => $material->label]) }}">
            @if($material->image ?? false)
            <img 
                src="{{Config::get('filesystems.distant_img_roots.'.Config::get('database.connections.mysql.database')).$image }}" 
                class="img-responsive"
            >
            @else 
                <img src="{{$image }}" class="img-responsive">
            @endif
        </a>

        @if ($category_icon)
        <div class="category-icon">
            <img src="{{ $category_icon }}">
        </div>
        @endif
    @endif 
</div>