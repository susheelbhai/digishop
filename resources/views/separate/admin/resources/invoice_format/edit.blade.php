<x-layout.admin.app>
    <x-slot name="head">
        <title> All Invoice Format | {{ config('app.name') }}</title>
        
    </x-slot>

    <x-grid.type.standard>
        <x-form.type.standard :title="$data['name']" action="{{ route('admin.invoiceFormat.update', $data['id']) }}" div="2">
            @method('patch')
            <x-grid.type.standard type="col" div="2">
                <x-form.element.input1 name="name" label="Format Name" :value="$data['name']" required="required" div="1" />
                <x-form.element.input1 name="slug" label="Format Slug" :value="$data['slug']" required="required" div="1" />
            </x-grid.type.standard>
            
            <x-form.element.input-img name="image" label="Image" :value="asset($data['image'])" div="2" ratio="125" />
        </x-form.type.standard>
    </x-grid.type.standard>
    
</x-layout.admin.app>
