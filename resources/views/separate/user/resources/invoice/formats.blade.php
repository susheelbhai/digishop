<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Invoice Settings | {{ config('app.name') }}</title>
    </x-slot>

    <x-card.type.standard style="{{ $tax_type_id==1?'non_gst':'gst' }}">
        <x-slot name="header">
            {{ $tax_type_id == 1 ? 'Non GST Invoice Formats' : 'GST Invoice Formats' }}
        </x-slot>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 p-4">
            @foreach ($all_formats as $i)
            <x-card.type.image :src="asset($i['image'])" div="4" class="bg-white">
                <x-card.element.footer>
                    {{ $i['name'] }}

                    <div>
                        @if ($data['invoice_format_id'] == $i->id)
                        <div class="text-right">
                            <span class="shadow-lg bg-success text-primary-foreground px-3 py-1">Default</span>
                        </div>
                        @else
                        <a class="text-lg font-bold" href="{{ route('invoice.format.setDefault', $i['id']) }}">
                            Make as default
                        </a>
                        @endif
                    </div>
                </x-card.element.footer>
            </x-card.type.image>
            @endforeach
        </div>
    </x-card.type.standard>


</x-layout.business-owner.app>