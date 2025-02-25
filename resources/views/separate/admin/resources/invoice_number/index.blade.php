<x-layout.admin.app>
    <x-slot name="head">
        <title> All Invoice Numbers | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.element.button1 :href="route('admin.invoiceNumber.create')" title="Add New" type="add" div="4" />
    <x-grid.type.standard>
        @foreach ($data as $i)
            <x-card.type.standard div="4">
                <x-card.element.header>
                    {{ $i['name'] }}
                    <a href="{{ route('admin.invoiceNumber.edit', $i['id']) }}">
                        edit
                    </a>
                </x-card.element.header>
                <x-card.element.body>
                    Sample 1 : {{ $i['sample1'] }} <br>
                    Sample 2 : {{ $i['sample2'] }} <br>
                    Sample 3 : {{ $i['sample3'] }}
                </x-card.element.body>
            </x-card.type.standard>
        @endforeach
    </x-grid.type.standard>

</x-layout.admin.app>
