<x-layout.business-owner.app>
    <x-slot name="head">
        <title> Product Report | {{ config('app.name') }}</title>
    </x-slot>
    
    <x-resources.report.form title="Product Report" :action="route('report.product')" />

</x-layout.business-owner.app>
