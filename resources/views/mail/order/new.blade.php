@component('mail::message')
# Introduction

Bonjour,


Un utilisateur a passé une nouvelle commande sur Prodice.

@component('mail::table')
| Article       | Quantité      | Tarif HT |
| ------------- |-------------:| --------:|
@foreach($order->lines as $line)
| {{ $line->product->name }}      | {{ $line->quantity }} | {{ number_format($line->amount_ht, 2, ',', ' ') }} € |
@endforeach
| **Total HT** | | **{{ number_format($order->total_ht, 2, ',', ' ') }} €** |
| **Total TTC** | | **{{ number_format($order->total_ttc, 2, ',', ' ') }} €** |
@endcomponent



@component('mail::button', ['url' => env('APP_URL').'/order/detail?id='.$order->getKey()])
Voir la commande
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
