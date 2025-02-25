<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Add Product | {{ config('app.name') }}</title>
    </x-slot>
    
    @livewire('user.product-create')
</x-layout.user.app>
