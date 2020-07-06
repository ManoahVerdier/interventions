<footer class="@if(!empty($footerClass)) {{ $footerClass }} @endif">
    <div class="container">
        <div class="row height-100">
            <div class="col-md-2 valign-middle d-flex justify-content-between">
                <span class="float-left copyright"><i class="far fa-copyright"></i> ODICE GROUPE</span>
            </div>
            <div class="col-md-4 valign-middle">
                <p class="w-100 text-center mb-2 font-weight-normal">Catégories</p>
                @foreach($categories_footer as $c)
                <a href="" class='w-100 d-inline-block mb-1 text-center'>{{$c->name}}</a>
                @endforeach
            </div>
            <div class="col-md-4  valign-middle">
                <p class="w-100 text-center mb-2">Marques</p>
                @foreach($brands_footer as $b)
                <a href="" class='w-100 d-inline-block mb-1 text-center'>{{$b->name}}</a>
                @endforeach
            </div>
            <div class="col-md-2 valign-middle d-flex justify-content-between">
                <span class="float-right email"><a href="mailto:contact@odice.com" class="primary-text">contact@odice.com</a></span>
            </div>
        </div>
    </div>
</footer>