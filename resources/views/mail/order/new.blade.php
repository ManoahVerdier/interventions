@component('mail::message')
# Une nouvelle commande

Le {{ date('d/m/Y') }} à {{ date('H:i') }}


Bonjour,


Un utilisateur a passé une nouvelle commande sur Prodice.

@component('mail::table')
| Article       | Quantité      | Tarif HT | Montant TVA | Total TTC |
| ------------- |-------------:| --------:| --------:| --------:|
@foreach($order->lines as $line)
| {{ $line->product->name }}      | {{ $line->quantity }} | {{ number_format($line->amount_ht, 2, ',', ' ') }} € | {{ number_format($line->amount_vat, 2, ',', ' ') }} € | {{ number_format($line->amount_ttc, 2, ',', ' ') }} € |
@endforeach
| **Total** | | **{{ number_format($order->total_ht, 2, ',', ' ') }} €** | **{{ number_format($order->total_vat, 2, ',', ' ') }} €** | **{{ number_format($order->total_ttc, 2, ',', ' ') }} €** |
@endcomponent



@component('mail::button', ['url' => env('APP_URL').'/order/detail?id='.$order->getKey()])
Voir la commande
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
