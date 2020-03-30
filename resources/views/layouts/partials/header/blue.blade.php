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

            {{-- Title --}}
            <div id="title" class="@if ($withSearch ?? false)col-md-2 @else col-md-3 @endif d-flex align-items-center ">
                <div>
                    <span>{{ $title }}</span><br>
                    <small>{{ $subtitle }}</small>
                </div>
            </div>

            {{-- Search bar --}}
            @if ($withSearch ?? false)
            <div id="search" class="col-md-4">
                <input type="email" class="form-control" placeholder="Un produit, une marque ?">
            </div>
            @endif

            {{-- Menu --}}
            <div class="col-md-1 @if (empty($withSearch))offset-md-4 @endif menu">
                <div class="h-100 valign-middle">
                    <a href="{{ route('favorites') }}" class="favorite"><i class="far fa-heart fa-lg"></i></a>
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

        @if ($punchLine ?? false)
        <div class="row title">
            <div class="col-md-6 offset-md-4">
                {!! $punchLine !!}
            </div>
        </div>
        @endif
    </div>
</header>