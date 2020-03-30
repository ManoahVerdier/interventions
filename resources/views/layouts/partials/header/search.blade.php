<header class="primary-bg">
    <div class="container">
        <div class="row">
            {{-- Logo --}}
            <div id="logo" class="col-md-1 d-flex align-items-center justify-content-center">
                <a href="/"><img src="{{ asset('img/layout/logo-prodice-lite.png') }}" class="img-fluid"></a>
            </div>

            {{-- Return --}}
            <div class="col-md-1 d-flex align-items-center justify-content-center">
                <a href="/"><img src="{{ asset('img/layout/chevron-return.png') }}" class="img-fluid"></a>
            </div>

            {{-- Search bar --}}
            <div id="category" class="col-md-2 d-flex align-items-center ">
                <div>
                    <span class="category_name">Ma recherche</span><br>
                    <small>456 produits</small>
                </div>
            </div>

            {{-- Search bar --}}
            <div id="search" class="col-md-5">
                <input type="email" class="form-control" placeholder="Un produit, une marque ?">
            </div>

            {{-- Menu --}}
            <div class="col-md-1 menu">
                <div class="h-100 valign-middle">
                    <a href="" class="favorite"><i class="far fa-heart fa-lg"></i></a>
                </div>
            </div>
            <div class="col-md-1 menu">
                <div class="h-100 valign-middle">
                    <a href=""><i class="fas fa-shopping-cart fa-lg"></i></a>
                </div>
            </div>
            <div class="col-md-1 menu">
                <div class="h-100 valign-middle">
                    <a href="" class="profile"><i class="fas fa-user-alt fa-lg"></i></a>
                </div>
            </div>
        </div>

        <div class="row title">
            <div class="col-md-6 offset-md-4">
                Quel produit<br>recherchez-vous ?
            </div>
        </div>
    </div>
</header>