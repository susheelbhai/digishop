<x-layout.admin.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Create Invoice Number | {{ config('app.name') }}</title>
    </x-slot>

    <section class="content">
        <div class="container-fluid">

            <x-form.type.standard title="Create Invoice Number" action="{{ route('admin.invoiceNumber.store') }}">
                <x-form.element.input1 name="name" label="Format Name" required="required" div="2" />
                <x-form.element.input1 name="slug" label="Format Slug" required="required" div="2"  />
                <x-form.element.input1 name="state_code" label="State Code " required="required" div="2"  />
                <x-form.element.input1 name="state_code_suffix" label="State Code Suffix "  div="2"  />
                <x-form.element.input1 name="financial_year" label="Financial Year " required="required" div="2"  />
                <x-form.element.input1 name="financial_year_hint" label="Financial Year Hint " required="required" div="2"  />
                <x-form.element.input1 name="financial_year_interfix" label="Financial Year Interfix "  div="2"  />
                <x-form.element.input1 name="financial_year_suffix" label="Financial Year Suffix " div="2"  />
                <x-form.element.input1 name="business_order_id_digit" label="Business Order Id Digit " required="required" div="2"  />
                <x-form.element.input1 name="sample1" label="Sample 1" type="text" div="2"  />
                <x-form.element.input1 name="sample2" label="Sample 2" type="text" div="2"  />
                <x-form.element.input1 name="sample3" label="Sample 3" type="text" div="2"  />
            </x-form.type.standard>

        </div>
    </section>
</x-layout.admin.app>
