@component('mail::message')
# Confirmation de commande

Le {{ date('d/m/Y') }} à {{ date('H:i') }}


Bonjour,


Vous venez d'effectuer une commande sur Prodice.

Votre commande a bien été prise en compte et sera traitée par notre équipe dans les plus brefs délais.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

@component('mail::table')
| Article       | Quantité      | Tarif HT | Montant TVA | Total TTC |
| ------------- |-------------:| --------:| --------:| --------:|
@foreach($order->lines as $line)
| {{ $line->product->name }}      | {{ $line->quantity }} | {{ number_format($line->amount_ht, 2, ',', ' ') }} € | {{ number_format($line->amount_vat, 2, ',', ' ') }} € | {{ number_format($line->amount_ttc, 2, ',', ' ') }} € |
@endforeach
| **Total** | | **{{ number_format($order->total_ht, 2, ',', ' ') }} €** | **{{ number_format($order->total_vat, 2, ',', ' ') }} €** | **{{ number_format($order->total_ttc, 2, ',', ' ') }} €** |
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
