@if($agent->isMobile())
    @if($hasMaterial ?? true)
    <div class="product-line col-6 col-md-12 mx-0 px-1">    
        <div class="col-md-3 offset-md-1 px-0 px-md-3 image-wrap">
            @include('layouts.partials.product.image')
        </div>
        <div class="col-md-4  px-0 px-md-3">
            @include('layouts.partials.product.description')
        </div>
    </div>
    @else 
    <div class="product-line col-12 col-md-12 mx-0 px-1">    
        <div class="col-md-3 offset-md-1 bg-blue">
            @include('layouts.partials.product.image')
        </div>
        <div class="col-md-4  px-0 px-md-3 bg-blue">
            @include('layouts.partials.product.description')
        </div>
    </div>
    @endif
@else
<div class="row product-line col-md-12">
    @if($hasMaterial ?? true)
        <div class="col-md-3 offset-md-1">
            @include('layouts.partials.product.image')
        </div>

        <div class="col-md-4 b-bordered">
            @include('layouts.partials.product.description')
        </div>
    @else
        <div class="col-md-3 offset-md-1 bg-blue">
            @include('layouts.partials.product.image')
        </div>
        <div class="col-md-4 bg-blue">
            @include('layouts.partials.product.description')
        </div>
    @endif
</div>
@endif