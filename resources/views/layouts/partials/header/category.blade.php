<header class="container">
    <div class="row h-100">
        {{-- Logo --}}
        <div id="logo" class="col-md-3 valign-middle">
            <a href="/"><img src="{{ asset('img/layout/logo-prodice.png') }}" class="img-fluid"></a>
        </div>

        {{-- Search bar --}}
        <a id="search" href="{{ route('search') }}" class="col-md-5 valign-middle">
            <div class="searchbar">
                <i class="fas fa-search fa-lg"></i>
                <span>Vous recherchez : <span class="search-type">un produit, une marque ?</span></span>
            </div>
        </a>

        {{-- Menu --}}
        <div class="col-md-1 menu">
            <div class="h-100 valign-middle">
                <a href="" class="favorite"><i class="far fa-heart fa-lg"></i></a>
            </div>
        </div>
        <div class="col-md-2 menu">
            <div class="h-100 valign-middle d-flex justify-content-between">
                <a href=""><i class="fas fa-shopping-cart fa-lg"></i></a>
                <a href="" class="login">Connectez-vous</a>
            </div>
        </div>
        <div class="col-md-1 menu">
            <div class="h-100 valign-middle">
                <a href="" class="profile"><i class="fas fa-user-alt fa-lg"></i></a>
            </div>
        </div>
    </div>
</header>