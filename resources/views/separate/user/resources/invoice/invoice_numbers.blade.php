<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Invoice Settings | {{ config('app.name') }}</title>
    </x-slot>
    <x-form.type.standard style="{{ $tax_type_id == 1 ? 'non_gst' : 'gst' }}" title="{{ $tax_type_id == 1 ? 'Non GST' : 'GST' }} Invoice Setting" action="{{ route('invoice.setting.update',$tax_type_id) }}" div=2>
        @method('patch')
        <input type="hidden" name="tax_type_id" value="{{ $tax_type_id }}">
        <x-form.element.input1 name="invoice_number_prefix" :value="$data['invoice_number_prefix']" type="text" label="Invoice Number Prefix" />
        <x-form.element.input1 name="invoice_number_suffix" :value="$data['invoice_number_suffix']" type="text" label="Invoice Number Suffix" />
        <input name="gstin" value="{{ $data['gstin'] }}" type="hidden" />

        <input name="pan" value="{{ $data['pan'] }}" type="hidden" />
        <input name="bank_detail" value="{{ $data['bank_detail'] }}" type="hidden" />
        <input name="payment_terms" value="{{ $data['payment_terms'] }}" type="hidden" />
        <input name="authorised_sign" value="{{ $data['authorised_sign'] }}" type="hidden" />
        <input name="authorised_stamp" value="{{ $data['authorised_stamp'] }}" type="hidden" />
        <input name="amount_in_words" value="{{ $data['amount_in_words'] }}" type="hidden" />
    </x-form.type.standard>


    <div class="grid grid-cols-4 gap-4 mt-5">
        @foreach ($all_formats as $i)
        <x-card.type.standard div="4">
            <x-card.element.header style="{{ $tax_type_id==1?'non_gst':'gst' }}">
                {{ $i['name'] }}
            </x-card.element.header>
            <x-card.element.body>
                Sample 1 : {{ $i['sample1'] }} <br>
                Sample 2 : {{ $i['sample2'] }} <br>
                Sample 3 : {{ $i['sample3'] }}


            </x-card.element.body>
            <x-card.element.footer>
                @if ($data['invoice_number_format_id'] == $i->id)
                <div class="text-right">
                    <span class="shadow-xl bg-success text-primary-foreground px-3 py-1">Default</span>
                </div>
                @else
                <a class="text-xl font-bold" href="{{ route('invoice_number.format.setDefault', [$i['id'], $data['tax_type_id']]) }}">
                    Make as default
                </a>
                @endif
            </x-card.element.footer>
        </x-card.type.standard>
        @endforeach
    </div>

</x-layout.business-owner.app>