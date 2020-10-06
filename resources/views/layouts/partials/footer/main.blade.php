<footer class="@if(!empty($footerClass)) {{ $footerClass }} @endif">
    <div class="container">
        <div class="row py-4 d-flex">
            <div class="col-4  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="48px" height="48px" src="{{ asset('img/homepage/question.png') }}">
            </div>
            
            <div class="col-8 col-md-4 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-2">Service client</div>
                <div class="second_line line">  
                    <span class="w-100 d-inline-block">04 92 79 41 99</span>
                    <a class="w-100 d-inline-block" href="mailto:e-commerce@prodice.net">sav@odice.cc</a>
                </div>
            </div>
            <div class='col-12 col-md-4 text-center'>
                @if(session('site_name') ?? false)
                    <div class="text-white">
                        Site :
                    </div>
                    <div class="text-blue">
                        {{ session('site_name')}}
                    </div>
                    @if(auth()->user()->sites()->count()>1)
                        <button class="btn btn-blue" data-toggle="modal" data-target="#siteModal">Changer de site</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</footer>
@include('modals.chooseSite')  