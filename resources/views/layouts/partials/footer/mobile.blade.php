<nav class="navbar navbar-light fixed-bottom bg-white mobile homepage-menu col-md-6 offset-md-3">
    {{-- Menu --}}
    <div class="d-flex justify-content-between align-items-center">
        <a class="nav-link navbar-brand home {{request()->routeIs('home')?'active':''}}" href="{{ route('home') }}">
            @if(request()->routeIs('home'))
                @svg('resources/svg/footer_logo_active', ['width' => 25, 'height' => 25, 'class' => 'picto '.(request()->routeIs('home')?'active':'')])<br>
            @else 
                @svg('resources/svg/footer_logo', ['width' => 25, 'height' => 25, 'class' => 'picto '.(request()->routeIs('home')?'active':'')])<br>
            @endif
            <span>Accueil</span>
        </a>
        <a class="nav-link search no-focus {{request()->routeIs('product.search')?'active':''}}"  style="min-width: 70px" href="{{ route('product.search') }}">
            @svg('resources/svg/footer_search', ['width' => 25, 'height' => 25, 'class' => 'picto '.(request()->routeIs('home')?'active':'')])<br>
            <span>Rechercher</span>
        </a>
        <a class="nav-link favorite {{request()->routeIs('favorites')?'active':''}}" href="{{ route('favorites') }}">
            @svg('resources/svg/footer_heart', ['width' => 25, 'height' => 25, 'class' => 'picto'])<br>
            <span>Favoris</span>
        </a>
        <a class="nav-link cart {{request()->routeIs('cart')?'active':''}}" href="{{ route('cart') }}" >
            @svg('resources/svg/footer_cart', ['width' => 25, 'height' => 25, 'class' => 'picto'])<br>
            <span>Panier</span>
        </a>
        <a class="nav-link no-focus {{request()->routeIs('profile')?'active':''}}" href="{{ route('profile') }}" >
            @svg('resources/svg/footer_user', ['width' => 25, 'height' => 25, 'class' => 'picto'])<br>
            <span>Compte</span>
        </a>
    </div>
</nav>