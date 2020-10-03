<header class="primary-bg">
    <div class="container">
        <div class="row">
            {{-- Return --}}
            @if ($withBack ?? false)
            <div class="col-2 d-md-none col-md-1 d-flex align-items-center justify-content-center">
                <a href="javascript:history.back()"><img src="{{ asset('img/layout/chevron-return.png') }}" class="img-fluid"></a>
            </div>
            @endif
            
            {{-- Logo --}}
            <div id="logo" class="col-2 offset-3 offset-md-0 col-md-1 d-flex d-md-flex align-items-center justify-content-center">
                <a href="/"><img src="{{ asset('img/layout/logo-prodice-lite.png') }}" class="img-fluid"></a>
            </div>

            <div class="col-3 text-white py-1 d-md-none text-right px-1">
                @auth
                    <div class="w-100 small">{{auth()->user()->username}}</div>
                    <div class="w-100 small">{{auth()->user()->domain->name ?? ''}}</div>
                @endauth
            </div>
            <div class="col-2 menu d-md-none text-right">
                <div class="h-100 valign-middle text-right">
                    @auth
                        <a href="{{ route('logout') }}" class="profile float-right"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                    @endauth
                </div>
            </div>

            
            

            {{-- Title --}}
            @if ($title ?? false)
            <div id="title" class="@if ($withSearch ?? false) col-7 col-md-2 @else col-12 text-center col-md-3 @endif d-flex align-items-center pt-sm-0">
                <div class="w-100">
                    <span>{{ $title }}</span><br>
                    @if ($subtitle ?? false)<small>{{ $subtitle }}</small>@endif
                </div>
            </div>
            @endif

            @if ($withSearch ?? false)
            {{-- Search button for mobile --}}
            <div class="col-2 col-md-1 d-flex d-md-none align-items-center justify-content-center offset-md-0 offset-3 ">
                <button type="submit" form="search-form" class="btn btn-blank d-blockd-md-none" id="search-mobile">
                    @svg('resources/svg/search', ['width' => 40, 'height' => 40, 'fill' => 'white'])
                </button>
            </div>
            @endif

            @if ($punchLine ?? false)
            <div class="col-12 title d-block d-md-none px-5 ml-2">
                    {!! $punchLine !!}
            </div>
            @endif

            {{-- Search bar --}}
            @if ($withSearch ?? false)
            <div id="search" class="col-md-5 mt-3 mt-md-0">
                <form id="search-form" method="get" action="{{ route('material.search.results') }}">
                    <input type="text" name="q" class="form-control" placeholder="Un produit, une marque ?" value="{{ $q ?? '' }}" autofocus>
                    <button type="sybmit" class="btn btn-link d-none d-md-block">
                        @svg('resources/svg/search', ['width' => 40, 'height' => 40])
                    </button>
                </form>
            </div>
            
            <div class="col-md-2 text-white py-1 d-none text-right d-md-block">
                @auth
                    <div class="w-100">{{auth()->user()->username}}</div>
                    <div class="w-100">{{auth()->user()->domain->name ?? ''}}</div>
                @endauth
            </div>

            @else

            <div class="col-md-2 offset-md-8 text-white py-1 d-none text-right d-md-block">
                @auth
                    <div class="w-100">{{auth()->user()->username}}</div>
                    <div class="w-100">{{auth()->user()->domain->name ?? ''}}</div>
                @endauth
            </div>

            @endif

            <div class="col-md-1 menu d-none d-md-block">
                <div class="h-100 valign-middle">
                    @auth
                        <a href="{{ route('logout') }}" class="profile"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                    @endauth
                </div>
            </div>
        </div>

        @if ($punchLine ?? false)
        <div class="row title d-none d-md-block">
            <div class="col-md-6 offset-md-4">
                {!! $punchLine !!}
            </div>
        </div>
        @endif

    </div>
</header>