<x-layout.user.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Invoice Settings | {{ config('app.name') }}</title>
    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        @foreach ($all_formats as $i)
            <x-card.type.image :src="asset($i['image'])" div="4">
                <x-card.element.footer>
                    {{ $i['name'] }}
                    @if ($data['invoice_format_id'] == $i->id)
                        <div class="text-success">Default</div>
                    @else
                        <div>
                            <a href="{{ route('invoice.format.setDefault', $i['id']) }}">
                                Make as default
                            </a>
                        </div>
                    @endif
                </x-card.element.footer>
            </x-card.type.image>
        @endforeach
    </div>


</x-layout.user.app>
