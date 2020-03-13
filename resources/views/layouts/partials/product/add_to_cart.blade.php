<div class="add-to-cart">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>

        <div class="col-8">
            <div class="price">
                @if (!empty($striked_price))<span class="striked-value">{{ number_format($striked_price, 2, ',', ' ') }} €</span>@endif
                <span class="value">{{ number_format($price, 2, ',', ' ') }} €</span><br>
                <span class="label">Prix H.T.</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-outline-warning btn-lg btn-block cart-btn">
                <i class="fas fa-shopping-cart cart-icon"></i>
                Ajouter au panier
                {{-- <i class="fas fa-plus add-icon"></i> --}}
            </button>
        </div>
    </div>
</div>