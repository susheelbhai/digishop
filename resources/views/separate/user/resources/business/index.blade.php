<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All Business | {{ config('app.name') }}</title>
    </x-slot>

    <!-- <x-form.element.button1 href="{{ route('business.create') }}" style='primary' title="Add New" />   -->
    

    <div class="grid md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 overflow-hidden">
        @forelse ($data as $i)
        <a href="{{ route('business.show', $i['business']['id']) }}">
            <x-table.type.responsive class="overflow-hidden">
                <x-slot name="title">{{ $i['business']['name'] }}</x-slot>
                <x-table.element.tr>
                    <x-table.element.th data="Email" />
                    <x-table.element.td> {{ $i['business']['email'] }} </x-table.element.td>
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="Phone" />
                    <x-table.element.td> {{ $i['business']['phone'] }} </x-table.element.td>
                </x-table.element.tr>
                <x-table.element.tr>
                    <x-table.element.th data="GSTIN" />
                    <x-table.element.td> {{ $i['business']['gst_number'] }} </x-table.element.td>
                </x-table.element.tr>
            </x-table.type.responsive>
        </a>

        @empty
            No Business Found
        @endforelse
        
    </div>

</x-layout.business-owner.app>
