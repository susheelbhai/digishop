<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All warehouse | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.element.button1 href="{{ route('warehouse.create') }}" style='primary' title="Add New" />  
    

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 overflow-hidden">
        @forelse ($data as $i)
        <a href="{{ route('warehouse.show', $i['id']) }}">
            <x-table.type.responsive class="overflow-hidden">
                <x-slot name="title">{{ $i['name'] }}</x-slot>
                <x-table.element.tr>
                    <x-table.element.th data="Address" />
                    <x-table.element.td> {{ $i['address'] }} </x-table.element.td>
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="City" />
                    <x-table.element.td> {{ $i['city'] }} </x-table.element.td>
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="Pin" />
                    <x-table.element.td> {{ $i['pin'] }} </x-table.element.td>
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="State" />
                    <x-table.element.td> {{ $i['state']['name'] }} </x-table.element.td>
                </x-table.element.tr>
            </x-table.type.responsive>
        </a>

        @empty
            No Business Found
        @endforelse
        
    </div>

</x-layout.business-owner.app>
