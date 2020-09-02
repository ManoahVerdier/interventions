<header class="container">
    <div class="row h-100">
        {{-- Logo --}}
        <div id="logo" class="col-12 col-lg-3 valign-middle text-center">
            <a href="/" class="w-100"><img src="{{ asset('img/layout/logo-prodice.png') }}" class="ml-0 img-fluid"></a>
        </div>

        {{-- Search bar --}}
        <a id="search" href="{{ route('product.search') }}" class="col-lg-6 d-none d-lg-block valign-middle">
            <div class="searchbar">
                <i class="fas fa-search fa-lg"></i>
                <span>Vous recherchez : <span class="search-type">un produit, une marque ?</span></span>
            </div>
        </a>
    </div>
    <div class="row d-none d-md-flex mt-3">
        <div class="col-9 offset-3 border-top border-light pb-1"></div>
    </div>
</header>