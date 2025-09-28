<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Invoice Settings | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.type.standard style="{{ $tax_type_id == 1 ? 'non_gst' : 'gst' }}" title="{{ $tax_type_id == 1 ? 'Non GST' : 'GST' }} Invoice Setting" action="{{ route('invoice.setting.update',$tax_type_id) }}" div=2>
        @method('patch')


        <input name="invoice_number_prefix" value="{{ $data['invoice_number_prefix'] }}" type="hidden"/>
        <input name="invoice_number_suffix" value="{{ $data['invoice_number_suffix'] }}" type="hidden"/>
        <input type="hidden" name="tax_type_id" value="{{ $tax_type_id }}">
        <x-form.element.input1 name="gstin" :value="$data['gstin']" type="switch"
            label="GSTIN" />
        <x-form.element.input1 name="pan" :value="$data['pan']" type="switch"
            label="PAN" />
        <x-form.element.input1 name="bank_detail" :value="$data['bank_detail']" type="switch"
            label="Bank Detail" />
        <x-form.element.input1 name="payment_terms" :value="$data['payment_terms']" type="switch"
            label="Payment Terms" />
        <x-form.element.input1 name="authorised_sign" :value="$data['authorised_sign']" type="switch"
            label="Authorised Signature" />
        <x-form.element.input1 name="authorised_stamp" :value="$data['authorised_stamp']" type="switch"
            label="Authorised Stamp" />
        <x-form.element.input1 name="amount_in_words" :value="$data['amount_in_words']" type="switch"
            label="Amount in words" />
    </x-form.type.standard>
    
</x-layout.business-owner.app>
