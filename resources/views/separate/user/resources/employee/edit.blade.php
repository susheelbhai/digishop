<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Edit Employee Application | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Edit Employee Application" action="{{ route('employee.update', $data['id']) }}">
        @method('patch')
        <x-form.element.form-group title="Employee Detail">
            <x-form.element.input1 name="name" :value="$data['name']" label="Employee Name" required="required" />
            <x-form.element.input1 name="email" :value="$data['email']" label="Employee Email" type="email" />
            <x-form.element.input1 name="phone" :value="$data['phone']" label="Employee Phone" />
            <x-form.element.input1 name="address" :value="$data['address']" label="Address" required="required" />
            <x-form.element.input1 name="city" :value="$data['city']" label="City" required="required" />
            <x-form.element.input1 name="pin" :value="$data['pin']" label="Pin Code" type="number" required="required" />
            <x-form.element.input1 name="state_id" :value="$data['state_id']" label="State" type="select" :options="$states" required="required" />
            <x-form.element.input1 name="gstin" label="GSTIN" :value="$data['gstin']" />
        </x-form.element.form-group>
        
    </x-form.type.standard>
    
</x-layout.business-owner.app>
