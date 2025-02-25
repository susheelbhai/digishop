<x-layout.admin.app>
    <x-slot name="head">
        <title> All Invoice Format | {{ config('app.name') }}</title>
    </x-slot>

    <x-form.element.button1 :href="route('admin.invoiceFormat.create')" title="Add New" type="add" div="4" />

    <x-grid.type.standard>
        @foreach ($data as $i)
            <x-card.type.image :src="asset($i['image'])" div="4">
                <x-card.element.footer>
                    {{ $i['name'] }}
                    <a href="{{ route('admin.invoiceFormat.edit', $i['id']) }}">
                        edit
                    </a>
                </x-card.element.footer>
            </x-card.type.image>
        @endforeach
    </x-grid.type.standard>

</x-layout.admin.app>
