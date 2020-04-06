@component('mail::message')
# Introduction

Bonjour,


Vous venez d'effectuer une commande sur Prodice.

Votre commande a bien été prise en compte et sera traitée par notre équipe dans les plus brefs délais.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

@component('mail::table')
| Article       | Quantité      | Tarif HT |
| ------------- |-------------:| --------:|
@foreach($order->lines as $line)
| {{ $line->product->name }}      | {{ $line->quantity }} | {{ number_format($line->amount_ht, 2, ',', ' ') }} € |
@endforeach
| **Total HT** | | **{{ number_format($order->total_ht, 2, ',', ' ') }} €** |
| **Total TTC** | | **{{ number_format($order->total_ttc, 2, ',', ' ') }} €** |
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
