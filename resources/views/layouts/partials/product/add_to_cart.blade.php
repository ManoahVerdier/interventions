<form method="post" action="@if ($remove ?? false){{ route('cart.delete') }}@else{{ route('cart.add') }}@endif" class="add-to-cart">
    @csrf
    <input type="hidden" name="product" value="{{ $product->id }}">

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <select class="form-control" name="quantity">
                    @for ($i = 1; $i <= 50; $i++)
                    <option @if (!empty($line) && $line->quantity === $i)selected="selected"@endif>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="col-8">
            <div class="price">
                @if (!empty($striked_price))<span class="striked-value">{{ number_format($striked_price, 2, ',', ' ') }} €</span>@endif
                <span class="value">{{ number_format($price, 2, ',', ' ') }} €</span><br>
                <span class="label">Prix H.T.</span>
                <input type="hidden" class="unit-price" value="{{ $product->priceAfterDiscount }}">
                <input type="hidden" class="unit-striked-price" value="{{ $product->price }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if ($remove ?? false)
                <button type="submit" class="btn btn-outline-secondary btn-lg btn-block delete-btn">
                    {{-- <i class="fas fa-shopping-cart cart-icon"></i> --}}
                    Supprimer
                </button>
            @else
                <button type="submit" class="btn btn-outline-warning btn-lg btn-block cart-btn">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                    Ajouter au panier
                    {{-- <i class="fas fa-plus add-icon"></i> --}}
                </button>
            @endif
        </div>
    </div>
</form>