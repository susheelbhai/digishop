<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All Order | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.element.button1 title="Add Now" type="add" :href="route('order.create')" />

    @livewire('business-owner.order-list', ['page_heading' => 'Non GST Orders', 
    'tax_type_id'=>1])
    @livewire('business-owner.order-list', ['page_heading' => 'GST Orders', 
    'tax_type_id'=>2])

</x-layout.business-owner.app>
