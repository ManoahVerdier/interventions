<section id="selection">
    <div class="container">
        {{-- Title --}}
        <div class="row">
            <div class="col-10">
                <h2>
                    <img src="{{ asset('img/layout/chevron-bottom.png') }}">
                    <span>Notre sélection</span>
                    <small class="primary-text">du moment</small>
                </h2>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-outline-secondary float-right">Voir +</button>
            </div>
        </div>

        {{-- Products --}}
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme" data-loop="true" data-center="true" data-margin="20" data-autoplay="true" data-autoplay-timeout="5000">
                    <div>
                        @include('layouts.partials.product.image', [
                            'discount' => 10,
                            'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?template=withpicto&$image=M_JE20B_S_FR&$picto=ALL_planet&hei=300&wid=300',
                            'category_icon' => asset('img/product/category/four.png'),
                            'category_name' => 'Four',
                            'isFavorite' => true,
                        ])

                        @include('layouts.partials.product.description', [
                            'name' => 'Tablette de nettoyage',
                            'short_description' => 'Self Cooking Center',
                            'quantity' => '100 Tabs',
                            'withPrice' => true,
                            'price' => 42.60
                        ])
                    </div>

                    <div>
                        @include('layouts.partials.product.image', [
                            'discount' => 0,
                            'image' => 'https://raja.scene7.com/is/image/Raja/products/jerrican-plastique-bleu-20_JE20B.jpg?image=M_JE10N_S_FR$default$',
                            'category_icon' => asset('img/product/category/four.png'),
                            'category_name' => 'Vaisselle'
                        ])

                        @include('layouts.partials.product.description', [
                            'name' => 'F420E - Détergent',
                            'short_description' => 'Self Cooking Center',
                            'quantity' => '12 kg',
                            'withPrice' => true,
                            'striked_price' => 35.25,
                            'price' => 38.25
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>