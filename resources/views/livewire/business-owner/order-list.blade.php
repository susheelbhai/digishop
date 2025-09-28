<x-table.type.paginate :title="$page_heading" :data="$order_data" style="{{ $tax_type_id==1?'non_gst':'gst' }}">

    <x-table.element.thead>
        <x-table.element.tr>
            <x-resources.order.index-th />
        </x-table.element.tr>
    </x-table.element.thead>

    <x-table.element.tbody>
        @forelse ($order_data as $i)
            <x-table.element.tr>
                <x-resources.order.index-td :data="$i" />
            </x-table.element.tr>
        @empty
            <x-table.element.tr>
                <x-table.element.td colspan="6" data="No Data Found" />
            </x-table.element.tr>
        @endforelse
    </x-table.element.tbody>

</x-table.type.paginate>
