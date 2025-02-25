<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Order Detail | {{ config('app.name') }}</title>
    </x-slot>


    <x-table.type.responsive title="All Products">

        <x-table.element.thead>
            <x-table.element.tr>
                <x-table.element.th data="Serial No." />
                <x-table.element.th data="Description" />
                <x-table.element.th data="Price" />
                <x-table.element.th data="GST" />
                <x-table.element.th data="Quantity" />
                <x-table.element.th data="Total" />
                {{-- <x-table.element.th data="Action" /> --}}
            </x-table.element.tr>
        </x-table.element.thead>

        <x-table.element.tbody>
            @php
                $total = 0;
            @endphp
            @forelse ($data['products'] as $key => $i)
                <x-table.element.tr>
                    {{-- <x-resources.invoice.index-td :data="$i" /> --}}
                    <x-table.element.td  data="{{ $key+1 }}" />
                    <x-table.element.td>
                        {{ $i['name'] }} <br>
                        {{ $i['description'] }} 
                    </x-table.element.td>
                    <x-table.element.td  data="{{ Helper::customMoneyFormat($i['taxable_amount']) }}" />
                    <x-table.element.td  data="{{ Helper::customMoneyFormat($i['gst_amount']) }}" />
                    <x-table.element.td  data="{{ $i['quantity'] }}" />
                    <x-table.element.td  data="{{ Helper::customMoneyFormat($i['total_price']) }}" />
                </x-table.element.tr>
                @php
                    $total += $i['sale_price'] * $i['quantity'];
                @endphp
            @empty
                <x-table.element.tr>
                    <x-table.element.td colspan="7" data="No Data Found" />
                </x-table.element.tr>
            @endforelse
            <x-table.element.tr>
                <x-table.element.td colspan="5" data="Sub Total" />
                <x-table.element.td colspan="1" data="{{ Helper::customMoneyFormat($total) }}" />
                <x-table.element.td colspan="1" data="" />
            </x-table.element.tr>
        </x-table.element.tbody>

    </x-table.type.responsive>

    
    <x-table.type.responsive title="Order Detail">
                
        <x-table.element.tbody>
            <x-resources.order.show-data :data="$data" />
            
            {{-- <x-table.element.tr>
                <x-table.element.td colspan="2">
                    <div class="col-12 py-3">
                        <a href="{{ route('order.edit', $data['id']) }}"
                            type="button" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            <span class="btn-icon-end"> Edit Detail </span>
                        </a>
                    </div>
                </x-table.element.td>
            </x-table.element.tr> --}}

        </x-table.element.tbody>

    </x-table.type.responsive>




    
</x-layout.user.app>
