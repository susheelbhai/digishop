<x-layout.business-owner.app>
    <x-slot name="head">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Invoice Settings | {{ config('app.name') }}</title>
    </x-slot>

    <div class="grid grid-cols-4 gap-4">
        @foreach ($all_formats as $i)
            <x-card.type.standard div="4">
                <x-card.element.header>
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
                        <a class="text-xl font-bold" href="{{ route('invoice_number.format.setDefault', $i['id']) }}">
                            Make as default
                        </a>
                    @endif
                </x-card.element.footer>
            </x-card.type.standard>
        @endforeach
    </div>

</x-layout.business-owner.app>
