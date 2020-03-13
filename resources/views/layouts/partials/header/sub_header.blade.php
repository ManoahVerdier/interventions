<nav class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-9 offset-2">
                <span class="category-pagination">
                    <span class="active">1</span>
                    <span>/ 3</span>
                </span>

                <a href="" class="category">
                    <span>
                        Tablettes de nettoyage
                    </span>

                    <img src="{{ asset('img/layout/chevron-bottom-blue.png') }}">
                </a>

            </div>
        </div>
    </div>
</nav>

<div id="categories">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <ul>
                    <li>
                        <a href="{{ route('category') }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>Tablette de nettoyage</span>
                            <div class="counter">
                                <span>4</span>
                                <img src="{{ asset('img/layout/chevron-right-blue.png') }}">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category') }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>Tablette d'entretien</span>
                            <div class="counter">
                                <span>2</span>
                                <img src="{{ asset('img/layout/chevron-right-blue.png') }}">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category') }}">
                            <img src="{{ asset('img/layout/category-icon.png') }}"><span>Tablette de rinçage</span>
                            <div class="counter">
                                <span>1</span>
                                <img src="{{ asset('img/layout/chevron-right-blue.png') }}">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>