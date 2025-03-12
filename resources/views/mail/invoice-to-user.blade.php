<x-mail::message>
# Thank you for order with {{ $data['business_name'] }}

Please find the invoice from the attached file.

<x-mail::button :url="route('invoice.show', ['id' => $data['id'], 'invoice_key' =>$data['invoice_key'] ])">
Download Invoice
</x-mail::button>


Thanks,<br>
{{ $data['business_name'] }}
</x-mail::message>
