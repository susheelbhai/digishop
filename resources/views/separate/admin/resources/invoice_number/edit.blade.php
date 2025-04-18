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
                <x-form.element.input1 name="state_code" :value="$data['state_code']" label="State Code " required="required" div="2"  />
                <x-form.element.input1 name="state_code_suffix" :value="$data['state_code_suffix']" label="State Code Suffix "  div="2"  />
                <x-form.element.input1 name="financial_year" :value="$data['financial_year']" label="Financial Year " required="required" div="2"  />
                <x-form.element.input1 name="financial_year_hint" :value="$data['financial_year_hint']" label="Financial Year Hint " required="required" div="2"  />
                <x-form.element.input1 name="financial_year_interfix" :value="$data['financial_year_interfix']" label="Financial Year Interfix " div="2"  />
                <x-form.element.input1 name="financial_year_suffix" :value="$data['financial_year_suffix']" label="Financial Year Suffix " div="2"  />
                <x-form.element.input1 name="business_order_id_digit" :value="$data['business_order_id_digit']" label="Business Order Id Digit " required="required" div="2"  />
                <x-form.element.input1 name="sample1" label="Sample 1" :value="$data['sample1']" type="text" />
                <x-form.element.input1 name="sample2" label="Sample 2" :value="$data['sample2']" type="text" />
                <x-form.element.input1 name="sample3" label="Sample 3" :value="$data['sample3']" type="text" />
            </x-form.type.standard>

        </div>
    </section>
</x-layout.admin.app>
