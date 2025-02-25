<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Warehouse Rack | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
      
        <x-table.type.paginate title="Available Inventory" :add-url="route('product.create')" :data="$data">

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
                    @forelse ($data as $i)
                        <x-table.element.tr>
                            <x-table.element.td :data="$i['product']['created_at']" />
                            <x-table.element.td :data="$i['product']['sku']" />
                            <x-table.element.td :data="$i['product']['name']" />
                            <x-table.element.td :data="$i['product']['mrp']" />
                            <x-table.element.td :data="$i['quantity']" />
                        </x-table.element.tr>
                    @empty
                        <x-table.element.tr>
                            <x-table.element.td colspan="6" data="No Data Found" />
                        </x-table.element.tr>
                    @endforelse
        
                </x-table.element.tbody>
        
            </x-table.type.paginate>

    </section>
</x-layout.user.app>
