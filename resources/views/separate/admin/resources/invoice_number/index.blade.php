<x-layout.admin.app>
    <x-slot name="head">
        <title> All Invoice Numbers | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.element.button1 :href="route('admin.invoiceNumber.create')" title="Add New" type="add" div="4" />
    <div class="grid grid-cols-4 gap-4">
        @foreach ($data as $i)
            <x-card.type.standard>
                <x-card.element.header>
                    <div class="grid grid-cols-2">
                        <h3>{{ $i['name'] }}</h3>
                        
                    </div>
                    <x-slot name="right_item">
                        <div class="bg-yellow-500">
                            <a class="text-right" href="{{ route('admin.invoiceNumber.edit', $i['id']) }}">
                                edit
                            </a>
                        </div>
                    </x-slot>
                    
                </x-card.element.header>
                <x-card.element.body>
                    Sample 1 : {{ $i['sample1'] }} <br>
                    Sample 2 : {{ $i['sample2'] }} <br>
                    Sample 3 : {{ $i['sample3'] }}
                </x-card.element.body>
            </x-card.type.standard>
        @endforeach
    </div>

</x-layout.admin.app>
