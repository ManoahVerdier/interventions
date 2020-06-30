<section id="selection">
    <div class="container">
        {{-- Title --}}
        <div class="row">
            <div class="col-10">
                <h2>
                    <img src="{{ asset('img/layout/logo-prodice-lite-dark.png') }}">
                    <span>Notre sélection</span>
                    <small class="primary-text">du moment</small>
                </h2>
            </div>
            <div class="col-2">
                {{-- <button type="button" class="btn btn-outline-secondary float-right">Voir +</button> --}}
            </div>
        </div>

        {{-- Products --}}
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme" data-xs="2" data-loop="true" data-center="true" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000">
                    @foreach ($selectionProducts as $product)
                    <div>
                        @include('layouts.partials.product.image', [
                            'discount' => $product->discount,
                            'image' => $product->image ?? asset('img/product/image_not_available.png'),
                            'category_icon' => $product->category->pictogram ?? null,
                            'category_name' => $product->category->name,
                            'isFavorite' => $product->isUserFavorite,
                        ])

                        @include('layouts.partials.product.description', [
                            'reference' => $product->reference,
                            'name' => $product->name,
                            'short_description' => substr($product->short_description, 0, 50),
                            'description' => $product->description,
                            'quantity' => $product->quantity,
                            'withPrice' => true,
                            'striked_price' => $product->discount ? $product->price : null,
                            'price' => $product->amountHTAfterDiscount
                        ])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>