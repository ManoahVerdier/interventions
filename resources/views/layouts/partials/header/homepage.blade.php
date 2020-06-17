<header class="container">
    <div class="row h-100">
        {{-- Logo --}}
        <div id="logo" class="col-7 col-lg-3 valign-middle">
            <a href="/"><img src="{{ asset('img/layout/logo-prodice.png') }}" class="img-fluid"></a>
        </div>

        {{-- Search bar --}}
        <a id="search" href="{{ route('product.search') }}" class="col-lg-5 d-none d-lg-block valign-middle">
            <div class="searchbar">
                <i class="fas fa-search fa-lg"></i>
                <span>Vous recherchez : <span class="search-type">un produit, une marque ?</span></span>
            </div>
        </a>

        {{-- Menu --}}
        <div class="col-5 col-lg-3 menu">
            <div class="h-100 valign-middle justify-content-around">
                @auth
                <a href="{{ route('favorites') }}" class="favorite"><i class="fas fa-heart fa-lg"></i></a>

                <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart fa-lg"></i></a>


                    <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                @endauth

                @guest
                <a href="{{ route('login') }}">
                    <span class="login mr-2 d-none d-sm-block-inline">Connectez-vous</span>
                    <i class="fas fa-user-alt fa-lg"></i>
                </a>
                @endguest
            </div>
        </div>

        {{-- <div class="col-md-3 menu">
            <div class="h-100 valign-middle">

            </div>
        </div> --}}
    </div>
</header>