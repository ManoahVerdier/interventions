@if($isProductPage ?? false)
<form method="post" action="@if ($remove ?? false){{ route('cart.delete') }}@else{{ route('cart.add') }}@endif" class="add-to-cart-mobile">
    @csrf
    <input type="hidden" name="product" value="{{ $product->id }}">
    @if ($remove ?? false)
        <button type="submit" class="btn btn-outline-secondary btn-lg btn-block delete-btn">
            <i class="fas fa-shopping-cart cart-icon"></i> 
        </button>
    @else
        <button type="submit" class="btn btn-warning cart-btn rounded-circle p-2">
            <i class="fas fa-shopping-cart cart-icon"></i>
            {{--<i class="fas fa-plus add-icon"></i> --}}
        </button>
    @endif
</form>
@endif 

@if(($isFavoritesPage ?? false) || ($isCartPage ?? false))
<form method="post" action="@if ($remove ?? false){{ route('cart.delete') }}@else{{ route('cart.add') }}@endif" class="add-to-cart">
    @csrf
    <input type="hidden" name="product" value="{{ $product->id }}">

    <div class="row mx-0">
        <div class="col-5 d-md-block pl-0">
            <div class="form-group">
                <select class="form-control" name="quantity">
                    @for ($i = 1; $i <= 50; $i++)
                    <option @if (!empty($line) && $line->quantity === $i)selected="selected"@endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="col-7 col-md-8 pr-0">
            <div class="price">
                @if (!empty($striked_price))<span class="striked-value">{{ number_format($striked_price, 2, ',', ' ') }} €</span>@endif
                <span class="value">{{ number_format($price, 2, ',', ' ') }} €</span><br>
                <span class="label">Prix H.T.</span>
                <input type="hidden" class="unit-price" value="{{ $product->amountHTAfterDiscount }}">
                <input type="hidden" class="unit-striked-price" value="{{ $product->amount_ht }}">
            </div>
        </div>
    </div>

    <div class="row d-md-flex mx-0">
        <div class="col-12 px-0">
            @if ($remove ?? false)
                <button type="submit" class="btn btn-outline-secondary btn-lg btn-block delete-btn px-2">
                    {{-- <i class="fas fa-shopping-cart cart-icon"></i> --}}
                    Supprimer
                </button>
            @else
                <button type="submit" class="btn btn-outline-warning btn-lg btn-block cart-btn px-2">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                    <span class=' d-md-block'>Ajouter au panier</span>
                    {{-- <i class="fas fa-plus add-icon"></i> --}}
                </button>
            @endif
        </div>
    </div>
</form>
@endif