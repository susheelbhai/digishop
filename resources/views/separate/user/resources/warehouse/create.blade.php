<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Create Warehouse | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Create Warehouse" action="{{ route('warehouse.store') }}">
        <x-form.element.form-group title="Warehouse Detail" div="2">
            <x-form.element.input1 name="name" label=" Name" required="required" />
            <x-form.element.input1 name="registration_number" label="Registration Number" />
            <x-form.element.input1 name="address" label="Address" required="required" />
            <x-form.element.input1 name="city" label="City" required="required" />
            <x-form.element.input1 name="pin" label="Pin Code" type="number" required="required" />
            <x-form.element.input1 name="state_id" label="State" type="select" :options="$states" value="3" required="required" />
        </x-form.element.form-group>
        
    </x-form.type.standard>
</x-layout.user.app>
