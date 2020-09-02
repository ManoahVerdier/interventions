<div id="categories" @if ($hide ?? false)style="display: none;"@endif>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <ul>
                    @foreach($categories as $category)
                    {{-- @continue($category->products()->count() === 0 && $category->children() === 0) --}}
                    <?php
                        $nb=0;
                        if($category??false)
                        {
                            $nb = $category->products->count();;
                            foreach($category->children()->get() as $child){
                                $nb+= $child->products->count();
                            }
                            
                            $route = route('category', ['id' => $category->getKey(), 'name' => $category->name]);
                            
                        }
                    ?>
                    <li>
                        <a href="{{ $route }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>{{ $category->name }}</span>
                            <div class="counter">
                                <span>{{ $nb }}</span>
                                <img src="{{ asset('img/layout/chevron-right-blue.png') }}">
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>