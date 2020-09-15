<footer class="@if(!empty($footerClass)) {{ $footerClass }} @endif">
    <div class="container">
        <div class="row py-4 d-flex">
            <div class="col-4  valign-middle text-center mx-auto">
                <img class="pt-1 mx-auto" width="48px" height="48px" src="{{ asset('img/homepage/question.png') }}">
            </div>
            <div class="col-8 py-3 px-0 text-left valign-top">
                <div class="first_line line mb-2">Service client</div>
                <div class="second_line line">  
                    <span class="w-100 d-inline-block">04 92 79 41 99</span>
                    <a class="w-100 d-inline-block" href="mailto:e-commerce@prodice.net">sav@odice.cc</a>
                </div>
            </div>
        </div>
    </div>
</footer>
MAIL_DRIVER=smtp
MAIL_HOST=in-v3.mailjet.com
MAIL_PORT=587
MAIL_USERNAME=dce8c32fcc4a93c940e4248259fbb633
MAIL_PASSWORD=78c3ab7a41a826a3a85c64ad1579c2b8
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=sav@odice.cc
MAIL_FROM_NAME="SAV Prodice"