<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Edit Product Detail | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Edit Product Detail" action="{{ route('product.update', $data['id']) }}">
        @method('patch')
        <x-form.element.form-group title="Product Detail">
            <x-form.element.input1 name="sku" :value="$data['sku']" label="Product SKU" required="required" />
            <x-form.element.input1 name="hsn_code" label="HSN Code" :value="$data['hsn_code']" required="required" />
            <x-form.element.input1 name="name" :value="$data['name']" label="Product Name" required="required" />
            <x-form.element.input1 name="description" :value="$data['description']" label="Description" />
            <x-form.element.input1 name="mrp" :value="$data['mrp']" label="MRP" type="number" required="required" />
            <x-form.element.input1 name="sale_price" :value="$data['sale_price']" type="number" label="Sale Price" required="required" />
            
        </x-form.element.form-group>
        
    </x-form.type.standard>
    
</x-layout.business-owner.app>
