<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All Inventory | {{ config('app.name') }}</title>
    </x-slot>

    <x-table.type.paginate title="Available Inventory" :add-url="route('product.create')" :data="$available_data">

        <x-table.element.thead>
            <x-table.element.tr>
                <x-table.element.th data="Date" />
                <x-table.element.th data="SKU" />
                <x-table.element.th data="Name" />
                <x-table.element.th data="MRP" />
                <x-table.element.th data="Quantity" />
            </x-table.element.tr>
        </x-table.element.thead>

        <x-table.element.tbody>
            @forelse ($available_data as $i)
                <x-table.element.tr>
                    <x-table.element.td :data="$i['created_at']" />
                    <x-table.element.td :data="$i['sku']" />
                    <x-table.element.td :data="$i['name']" />
                    <x-table.element.td :data="$i['mrp']" />
                    <x-table.element.td :data="$i['inventory_sum_quantity']" />
                    <x-table.element.td :data="$i['quantity']" />
                </x-table.element.tr>
            @empty
                <x-table.element.tr>
                    <x-table.element.td colspan="6" data="No Data Found" />
                </x-table.element.tr>
            @endforelse

        </x-table.element.tbody>

    </x-table.type.paginate>

    <x-table.type.paginate title="Inventory Transaction" :data="$data">

        <x-table.element.thead>
            <x-table.element.tr>
                <x-table.element.th data="Date" />
                <x-table.element.th data="SKU" />
                <x-table.element.th data="Name" />
                <x-table.element.th data="MRP" />
                <x-table.element.th data="Sale Price" />
                <x-table.element.th data="Purchase Price" />
                <x-table.element.th data="Transaction" />
            </x-table.element.tr>
        </x-table.element.thead>

        <x-table.element.tbody>
            @forelse ($data as $i)
                <x-table.element.tr>
                    <x-table.element.td :data="$i['created_at']" />
                    <x-table.element.td :data="$i['product']['sku']" />
                    <x-table.element.td :data="$i['product']['name']" />
                    <x-table.element.td :data="$i['product']['mrp']" />
                    <x-table.element.td>
                        @if ($i['purchase_price'] == null)
                            {{ $i['sale_price'] }}
                        @endif
                    </x-table.element.td>
                    <x-table.element.td :data="$i['purchase_price']" />
                    <x-table.element.td :data="$i['quantity']" />
                </x-table.element.tr>
            @empty
                <x-table.element.tr>
                    <x-table.element.td colspan="6" data="No Data Found" />
                </x-table.element.tr>
            @endforelse

        </x-table.element.tbody>

    </x-table.type.paginate>

</x-layout.user.app>
