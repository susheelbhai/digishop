<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All Order | {{ config('app.name') }}</title>

    </x-slot>

    @php
        if ($data->sum('amount') < 100) {
            $balance_card = 'danger';
        } elseif ($data->sum('amount') < 1000) {
            $balance_card = 'warning';
        } else {
            $balance_card = 'success';
        }
    @endphp

    


    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        <x-form.type.standard title="Add Money" submitName="Checkout" action="{{ route('transaction.store') }}" div=1>
            <x-form.element.input1 name="order_id" type="hidden" value="ffikjh" />
            <x-form.element.input1 name="amount" label="Amount in Rupees" required="required" div="1"
                placeholder="₹ " min="100" max="9999" />
            {{-- <x-form.element.button1 name="button" type="submit" title="Checkout" div=1 /> --}}
        </x-form.type.standard>
        <x-card.type.standard :style="$balance_card">
            <x-slot name="header">
                Available Balance
            </x-slot>
            <x-text.h2 style="{{ $balance_card }}">
                <div class="text-xl md:text-3xl lg:text-4xl py-8 md:pt-12 lg:pt-16 w-full text-center align-middle" >
                    {{ Helper::customCurrencyFormat($data->sum('amount')) }}
                </div>
            </x-text.h2>
        </x-card.type.standard>
        @if ($data->sum('amount') < 2)
            <x-card.type.standard :style="$balance_card">
                <x-slot name="header">
                    Insufficient Balance  
                </x-slot>
                <div class="h-full w-full text-center align-middle">
                    You do not have sufficient balance to create orders. Please add fund in your wallet to make the
                    orders.
                </div>
            </x-card.type.standard>
        @endif
    </div>

    @if (count($payments) != 0)
        <x-table.type.responsive title="All Payments">

            <x-table.element.thead>
                <x-table.element.tr>
                    <x-table.element.th data="Date" />
                    <x-table.element.th data="Amount" />
                    <x-table.element.th data="Gst" />
                    <x-table.element.th data="Total" />
                    <x-table.element.th data="Invoice" />
                </x-table.element.tr>
            </x-table.element.thead>

            <x-table.element.tbody>
                @forelse ($payments as $i)
                    <x-table.element.tr>
                        <x-table.element.td :data="Helper::customDate($i['created_at'])" />
                        <x-table.element.td :data="$i['amount'] / (1 + 0.01 * $i['gst_percentage'])" />
                        <x-table.element.td :data="$i['amount']*(1-1 / (1 + 0.01 * $i['gst_percentage']))" />
                        <x-table.element.td :data="$i['amount']" />
                        <x-table.element.td>
                            <a href="{{ route('create_payment_invoice', $i['id']) }}" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                        </x-table.element.td>
                    </x-table.element.tr>
                @empty
                    <x-table.element.tr>
                        <x-table.element.td colspan="6" data="No Data Found" />
                    </x-table.element.tr>
                @endforelse

            </x-table.element.tbody>

        </x-table.type.responsive>
    @endif

    <x-table.type.responsive title="All Transaction">

        <x-table.element.thead>
            <x-table.element.tr>
                <x-table.element.th data="Date" />
                <x-table.element.th data="Amount" />
                <x-table.element.th data="Transaction Type" />
                <x-table.element.th data="Remarks" />
            </x-table.element.tr>
        </x-table.element.thead>

        <x-table.element.tbody>
            @forelse ($data as $i)
                <x-table.element.tr>
                    <x-table.element.td :data="Helper::customDate($i['created_at'])" />
                    @if ($i['amount'] > 0)
                        <x-table.element.td>
                            <span class="text-success"> + {{ $i['amount'] }} </span>
                        </x-table.element.td>
                    @else
                        <x-table.element.td>
                            <span class="text-danger"> {{ $i['amount'] }} </span>
                        </x-table.element.td>
                    @endif

                    <x-table.element.td :data="$i['transactionType']['name'] ?? ''" />
                    <x-table.element.td :data="$i['remarks']" />
                </x-table.element.tr>
            @empty
                <x-table.element.tr>
                    <x-table.element.td colspan="6" data="No Data Found" />
                </x-table.element.tr>
            @endforelse

        </x-table.element.tbody>

    </x-table.type.responsive>


</x-layout.business-owner.app>
