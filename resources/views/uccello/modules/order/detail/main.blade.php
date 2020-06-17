@extends('uccello::modules.default.detail.main')

@section('other-blocks')
<div class="card">
    <div class="card-content">
        <span class="card-title">
            <i class="material-icons primary-text">shopping_cart</i>
            {{ uctrans('block.lines', $module)}}
        </span>

        @php ($productModule = ucmodule('product'))
        <table>
            <tr>
                <th>{{ uctrans('line.product', $module) }}</th>
                <th class="right-align">{{ uctrans('line.quantity', $module) }}</th>
                <th class="right-align">{{ uctrans('line.amount_ht', $module) }}</th>
                <th class="right-align">{{ uctrans('line.amount_vat', $module) }}</th>
                <th class="right-align">{{ uctrans('line.amount_ttc', $module) }}</th>
            </tr>
            @forelse($record->lines as $line)
            <tr>
                <td><a href="{{ ucroute('uccello.detail', $domain, $productModule, ['id' => $line->product_id]) }}">{{ $line->product->name }}</a></td>
                <td class="right-align">{{ $line->quantity }}</td>
                <td class="right-align">{{ number_format($line->amount_ht, 2, ',', ' ') }} €</td>
                <td class="right-align">{{ number_format($line->amount_vat, 2, ',', ' ') }} €</td>
                <td class="right-align">{{ number_format($line->amount_ttc, 2, ',', ' ') }} €</td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" class="center-align red-text">{{ uctrans('line.empty', $module) }}</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection