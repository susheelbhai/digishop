<x-layout.admin.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Create Invoice Format | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard title="Create Invoice Format" action="{{ route('admin.invoiceFormat.store') }}">
        <x-grid.type.standard type="col" div="2">
            <x-form.element.input1 name="name" label="Format Name" required="required" div="1" />
            <x-form.element.input1 name="slug" label="Format Slug" required="required" div="1" />
        </x-grid.type.standard>
        <x-form.element.input-img name="image" label="Image" div="3" />
    </x-form.type.standard>

</x-layout.admin.app>
