<div class="product @if(isset($hasMaterial)&& !$hasMaterial) mb-0 bg-transparent @endif">
    @if($hasMaterial ?? true)
        <a href="{{ route('material', ['id' => $material->getKey()]) }}">
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
    @else
        <a href="{{ route('materialOther') }}">
            <img height="48px" height="48px" src="{{$image }}" class="img-responsive">
        </a>
    @endif 
</div>