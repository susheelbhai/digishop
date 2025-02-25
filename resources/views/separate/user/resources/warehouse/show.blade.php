<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Show Warehouse Detail | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="grid lg:grid-cols-2">
            <x-table.type.responsive title="Warehouse Detail">

                <x-table.element.tbody>
                    <x-table.element.tr>
                        <x-table.element.th data="Name" />
                        <x-table.element.td> {{ $data['name'] }} </x-table.element.td>
                    </x-table.element.tr>
                    <x-table.element.tr>
                        <x-table.element.th data="Address" />
                        <x-table.element.td> {{ $data['address'] }} </x-table.element.td>
                    </x-table.element.tr>
                    <x-table.element.tr>
                        <x-table.element.th data="City" />
                        <x-table.element.td> {{ $data['city'] }} </x-table.element.td>
                    </x-table.element.tr>
                    <x-table.element.tr>
                        <x-table.element.th data="pin" />
                        <x-table.element.td> {{ $data['pin'] }} </x-table.element.td>
                    </x-table.element.tr>
                    <x-table.element.tr>
                        <x-table.element.th data="State" />
                        <x-table.element.td> {{ $data['state']['name'] }} </x-table.element.td>
                    </x-table.element.tr>
                    <x-table.element.tr>
                        <x-table.element.td colspan=2>
                            <x-form.element.button1 href="{{ route('warehouse.edit', $data['id']) }}" style='primary'
                                title="Edit" />

                        </x-table.element.td>
                    </x-table.element.tr>

                </x-table.element.tbody>

            </x-table.type.responsive>

        </div>
       
        <x-card.type.standard>
            <x-slot name="header"> Racks
            </x-slot>
            
            <x-slot:right_header>
                <a  href="{{ route('warehouse.addRacks', $data['id']) }}">
                    <x-ui.button.small style='secondary' title="Add Racks" />
                </a>
                 
             </x-slot:right_header>

            <div class="p-4 grid grid-cols-4 gap-4 md:grid-cols-8 lg:grid-cols-12">

                @forelse ($data['racks'] as $rack)
                <a href="{{ route('warehouse.racks.show', $rack['id']) }}">

                    <div class="bg-red-100 p-5 rounded text-center font-bold">
                        {{ $rack['name'] }}
                    </div>
                </a>
                @empty
                    No rack found
                @endforelse
            </div>

        </x-card.type.standard>

    </section>
</x-layout.user.app>
