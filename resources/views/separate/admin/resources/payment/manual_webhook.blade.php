<x-layout.admin.app>
        <x-slot name="head">
            <meta name="description" content="">
            <meta name="author" content="">
            <title> Dashboard | {{ config('app.name') }}</title>
        </x-slot>
    
        <x-form.type.standard title="Manual Webhook" action="{{ route('manualWebhook') }}">
            <x-form.element.input1 name="order_id" label="Order Id"  required="required" />
            <x-form.element.input1 name="payment_id" label="Payment Id"  required="required" />
            <x-form.element.input1 name="event" value="payment.captured" label="Payment Id"  required="required" />
        </x-form.type.standard>
    
    
        <section class="content">
    
        </section>
    </x-layout.admin.app>
    