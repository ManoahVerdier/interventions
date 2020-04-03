<div id="categories" @if ($hide ?? false)style="display: none;"@endif>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <ul>
                    @foreach($brands as $brand)
                    @continue($brand->productsCountForCategory($category) === 0)
                    <li>
                        <a href="{{ route('category.brand', ['categoryId' => $category->getKey(), 'brandId' => $brand->getKey()]) }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>{{ $brand->name }}</span>
                            <div class="counter">
                                <span>{{ $brand->productsCountForCategory($category) }}</span>
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