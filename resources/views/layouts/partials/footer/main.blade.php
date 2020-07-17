<footer class="@if(!empty($footerClass)) {{ $footerClass }} @endif">
    <div class="container">
        <div class="row height-100">
            <div class="mt-3 mt-md-1 col-md-5 valign-top">
                <p class="w-100 mb-0 font-weight-bold">A PROPOS DE PRODICE</p>
                <p class="w-100">Prodice est un service de vente de produits
                d’entretien pour tous les équipements
                professionnels de grandes cuisines.
                Rattaché à ODICE GROUPE, nous proposons
                des solutions dédiées pour les cuisines
                professionnelles depuis 40 ans</p>
                <span class="w-100 copyright"><i class="far fa-copyright"></i> ODICE GROUPE</span>
            </div>
            <div class="mt-3 mt-md-1 col-md-4 valign-top">
                <p class="w-100 text-left mb-2 font-weight-bold">POUR LES PROFESSIONNELS</p>
                <ul>
                    @foreach($categories_footer as $c)
                        <li><a href="/category/{{$c->id}}/brands" class='w-100 d-inline-block mb-0 text-left'>{{$c->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-3 mt-md-1 col-md-3 valign-top text-left">
                <p class="w-100">
                    <span class="font-weight-bold">PRODICE</span><br>
                    GROUPE ODICE<br>
                    www.odice.info<br>
                </p>
                <span class="email w-100 d-inline-block"><a href="mailto:e-commerce@prodice.net" class="primary-text">e-commerce@prodice.net</a></span>
                <span class="email w-100 d-inline-block"><a href="tel:0967895354" class="primary-text">09 67 89 53 54</a></span>
            </div>
        </div>
    </div>
</footer>