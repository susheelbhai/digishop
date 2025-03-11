<x-layout.business-owner.app>
    <x-slot name="head">
        <title> Inventory Report | {{ config('app.name') }}</title>
    </x-slot>
    
    <x-resources.report.form title="Inventory Report" :action="route('report.inventory')" />

</x-layout.business-owner.app>
