<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Product Settings | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Product Setting" action="{{ route('product.setting.update') }}" div=2>
        @method('patch')
        <x-form.element.input1 name="auto_print_bar_code" :value="$data['auto_print_bar_code']" type="switch"
            label="Print Bar Code on add new" />
        <x-form.element.input1 name="add_product_while_order" :value="$data['add_product_while_order']" type="switch"
            label="Auto add inventory if product is out of stock" />
        <x-form.element.input1 name="default_gst_percentage" :value="$data['default_gst_percentage']" type="number"
            label="Default GST %" />
    </x-form.type.standard>
    
</x-layout.business-owner.app>
