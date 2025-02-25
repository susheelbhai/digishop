<x-layout.user.app>
    <x-slot name="head">
        <title> Order Report | {{ config('app.name') }}</title>
    </x-slot>
    
    <x-resources.report.form title="Order Report" :action="route('report.order')" />

</x-layout.user.app>
