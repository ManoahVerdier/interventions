<div id="categories" @if ($hide ?? false)style="display: none;"@endif>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-md-4">
                <ul>
                    @foreach($product_ranges as $product_range)
                    {{-- @continue($product_range->products()->count() === 0 && $product_range->children() === 0) --}}
                    <?php
                        $nb=0;
                        if($product_range??false)
                        {
                            $nb = $product_range->countUser();
                            /*foreach($product_range->children()->get() as $child){
                                $nb+= $child->materials->count();
                            }*/
                            
                            $route = route('product_range', ['id' => $product_range->getKey(), 'name' => $product_range->name]);
                            
                        }
                    ?>
                    <li>
                        <a href="{{ $route }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>{{ $product_range->name }}</span>
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