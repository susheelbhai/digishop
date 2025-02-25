<x-layout.admin.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Edit Invoice Number | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">

            <x-form.type.standard title="Create Invoice Number" action="{{ route('admin.invoiceNumber.update', $data['id']) }}">
                @method('patch')
                <x-form.element.input1 name="name" label="Format Name" :value="$data['name']" required="required" />
                <x-form.element.input1 name="slug" label="Format Slug" :value="$data['slug']" required="required" />
                <x-form.element.input1 name="sample1" label="Sample 1" :value="$data['sample1']" type="text" />
                <x-form.element.input1 name="sample2" label="Sample 2" :value="$data['sample2']" type="text" />
                <x-form.element.input1 name="sample3" label="Sample 3" :value="$data['sample3']" type="text" />
            </x-form.type.standard>

        </div>
    </section>
</x-layout.admin.app>
