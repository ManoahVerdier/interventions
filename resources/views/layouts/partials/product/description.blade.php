<div class="description pt-md-3">
    @if($hasMaterial ?? true)
        <a href="{{ route('material', ['id' => $material->getKey()]) }}" class="product-name">{{ $name }}</a>
        <div class="reference d-md-block">
            <span class="label">Référence :</span>
            <span class="value">{{ $reference }}</span>
        </div>
        <div class="reference d-md-block">
            <span class="label">Modèle :</span>
            <span class="value">{{ $model }}</span>
        </div>
        <div class="reference d-md-block">
            <span class="label">Emplacement :</span>
            <span class="value">{{ $location }}</span>
        </div>
        <div class="reference d-md-block">
            <span class="label">Code :</span>
            <span class="value">{{ $code }}</span>
        </div>
    @else 
        <a href="{{ route('materialOther') }}" class="product-name text-white">{{ $name }}</a>
        <div class="reference d-md-block mb-md-3 mb-1">
            {{$description}}
        </div>
        <div class="mb-3 w-100 text-center pb-3 pb-md-0">
            <a href="{{ route('materialOther') }}" class="btn btn-light text-blue">{{ $name }}</a>
        </div>
    @endif
    

    @if ($withBrand ?? false)
    <div class="logo d-none d-md-block">
        @if ($brandImage)
        <img src="{{ $brandImage }}" alt="{{ $brandName }}" class="img-responsive">
        @else
        <b>{{ $brandName }}</b>
        @endif
    </div>
    @endif

    @if ($withDescription ?? false)
        @if(($isProductPage ?? false) && $agent->isMobile())
        <div class='description-wrap mt-3'>
            <a class="toggle-description mt-0 d-flex" data-toggle="collapse" href="#collapseDescription" role="button" aria-expanded="false" aria-controls="collapseDescription">
                <div class="ml-3 flex-fill">
                    Description
                </div>
                <div class="mr-3 chevron">
                    <img src="{{asset("/img/layout/chevron-right.png")}}">
                </div>

                <div class="collapse" id="collapseDescription">
                
            </a>
            <p class="product-description">
                    {!! nl2br($description) !!}
            </p>
        </div>
        @else
        <p class="product-description">
            {!! nl2br($description) !!}
        </p>
        @endif
    @endif

</div>