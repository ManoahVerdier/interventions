<nav class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-9 offset-1 offset-md-2">
                @if ($categories->count() > 0)
                <span class="category-pagination">
                    <span class="active">1</span>
                    <span>/ {{ $categories->count() }}</span>
                </span>
                @endif

                <a href="" class="category">
                    <span class="active">
                        {{ $category->name }}
                    </span>

                    <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                </a>
            </div>
        </div>
    </div>
</nav>