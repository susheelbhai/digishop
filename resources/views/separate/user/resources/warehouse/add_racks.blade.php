<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Create Warehouse Racks | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Create Warehouse Racks" action="{{ route('warehouse.racks.store', $data['id']) }}">
        <x-form.element.input1 name="prefix" label=" Prefix" />
        <x-form.element.input1 name="suffix" label="Suffix" />
        <x-form.element.input1 name="start_number" label="Start Number" required="required" />
        <x-form.element.input1 name="last_number" label="Last Number" required="required" />
    </x-form.type.standard>
</x-layout.business-owner.app>
