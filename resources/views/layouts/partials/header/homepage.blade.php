<header class="container">
    <div class="row h-100">
        {{-- Logo --}}
        <div id="logo" class="col-8 offset-2 offset-md-0 col-lg-3 valign-middle text-center">
            <a href="/" class="w-100"><img src="{{ asset('img/layout/logo-proservice.png') }}" class="ml-0 img-fluid"></a>
        </div>

        {{-- Search bar --}}
        <a id="search" href="{{ route('product.search') }}" class="col-lg-6 d-none d-lg-block valign-middle">
            <div class="searchbar">
                <i class="fas fa-search fa-lg"></i>
                <span>Vous recherchez : <span class="search-type">un produit, une marque ?</span></span>
            </div>
        </a>
        <div class="col-md-2 text-blue py-1 d-none text-right d-md-block">
            <?php dd(auth()->user())?>
            <div class="w-100">{{auth()->user()->username}}</div>
            <div class="w-100">{{auth()->user()->company->company}}</div>
        </div>
        <div class="col-lg-1 col-2 col-md-1 menu ">
            <div class="h-100 valign-middle text-right">
                @auth
                    <a href="{{ route('logout') }}" class="profile float-right"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                @endauth
            </div>
        </div>
        <div class="col-12 d-md-none text-center pt-2 text-blue">
            <div class="small d-inline-block">{{auth()->user()->username}}</div>
            <div class="dash  d-inline-block"> - </div>
            <div class="small d-inline-block">{{auth()->user()->company->company}}</div>
        </div>
    </div>
    <div class="row d-none d-md-flex mt-3">
        <div class="col-9 offset-3 border-top border-light pb-1"></div>
    </div>
</header>