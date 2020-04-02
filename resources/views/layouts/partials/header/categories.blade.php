<div id="categories" @if ($hide ?? false)style="display: none;"@endif>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <ul>
                    @foreach($categories as $category)
                    @continue($category->products()->count() === 0)
                    <li>
                        <a href="{{ route('category', ['id' => $category->getKey(), 'name' => $category->name]) }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>{{ $category->name }}</span>
                            <div class="counter">
                                <span>{{ $category->products->count() }}</span>
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