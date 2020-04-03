<header class="primary-bg">
    <div class="container">
        <div class="row">
            {{-- Logo --}}
            <div id="logo" class="col-md-1 d-flex align-items-center justify-content-center">
                <a href="/"><img src="{{ asset('img/layout/logo-prodice-lite.png') }}" class="img-fluid"></a>
            </div>

            {{-- Return --}}
            <div class="col-md-1 d-flex align-items-center justify-content-center">
                <a href="{{ url()->previous() }}"><img src="{{ asset('img/layout/chevron-return.png') }}" class="img-fluid"></a>
            </div>

            {{-- Title --}}
            <div id="title" class="@if ($withSearch ?? false)col-md-2 @else col-md-3 @endif d-flex align-items-center ">
                <div>
                    <span>{{ $title }}</span><br>
                    @if ($subtitle ?? false)<small>{{ $subtitle }}</small>@endif
                </div>
            </div>

            {{-- Search bar --}}
            @if ($withSearch ?? false)
            <div id="search" class="col-md-5">
                <input type="email" class="form-control" placeholder="Un produit, une marque ?" autofocus>
            </div>
            @endif

            {{-- Menu --}}
            <div class="col-md-1 @if (empty($withSearch))offset-md-4 @endif menu">
                @auth
                <div class="h-100 valign-middle">
                    <a href="{{ route('favorites') }}" class="favorite"><i class="fas fa-heart fa-lg"></i></a>
                </div>
                @endauth
            </div>
            <div class="col-md-1 menu">
                @auth
                <div class="h-100 valign-middle">
                    <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart fa-lg"></i></a>
                </div>
                @endauth
            </div>

            <div class="col-md-1 menu">
                <div class="h-100 valign-middle">
                    @auth
                        <a href="{{ route('logout') }}" class="profile"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="profile"><i class="fas fa-user-alt fa-lg"></i></a>
                    @endguest
                </div>
            </div>

        </div>

        @if ($punchLine ?? false)
        <div class="row title">
            <div class="col-md-6 offset-md-4">
                {!! $punchLine !!}
            </div>
        </div>
        @endif

        @if ($withCartSummary ?? false)
        <div class="row mt-3">
            <div class="col-md-6 offset-md-1">
                <div id="cart-summary" class="d-flex align-items-center justify-content-between">
                    <i class="fas fa-shopping-cart fa-2x"></i>

                    <div class="d-flex pt-1">
                        <span>Sous-total ({{ trans_choice('site.cart.items', $productsCount, ['value' => $productsCount]) }}):</span>
                        <div class="amount">
                            <span class="value">{{ number_format($totalPrice, 2, ',', ' ') }} €</span><br>
                            Prix H.T.
                        </div>
                    </div>

                    <img src="{{ asset('img/layout/chevron-bottom.png') }}">
                </div>
            </div>
            <div class="col-md-4">
                <a class="btn btn-warning btn-lg btn-block">
                    Passer commande
                </a>
            </div>
        </div>
        @endif
    </div>
</header>