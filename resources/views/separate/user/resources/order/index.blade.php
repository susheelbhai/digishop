<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> All Order | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.element.button1 title="Add Now" type="add" :href="route('order.create')" />

    @livewire('user.order-list')

</x-layout.user.app>
