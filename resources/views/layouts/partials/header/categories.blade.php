<div id="categories" @if ($hide ?? false)style="display: none;"@endif>
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