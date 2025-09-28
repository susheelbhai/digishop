<x-card.type.standard>
    <x-card.element.header>
        Add Product
    </x-card.element.header>
    <x-card.element.body>
        <x-form.element.input1 name="taxTypeId" label="Tax Type" type="select" :options="$taxTypes" required="required" wire:model.live="taxTypeId" div="1" />
        <x-grid.type.standard div="2">
            <x-form.element.input1 name="warehouse_id" label="Warehouse" type="select" :options="$warehouses"
                required="required" wire:model="warehouse_id" />
            <x-form.element.input1 name="warehouse_rack_number" label="Rack Number" wire:model="warehouse_rack_number" />
            <x-form.element.input1 name="sku" label="SKU (Unique number for product)" type="number"
                required="required" wire:model.live="sku" min="1000" />
            @if ($product == null)
            <x-form.element.input1 name="hsn_code" label="HSN Code" required="required" type="number"
                wire:model="hsn_code" />
            <x-form.element.input1 name="name" label="Title" required="required" wire:model="name" />
            <x-form.element.input1 name="description" label="Description" wire:model="description" />
            <x-form.element.input1 name="mrp" label="MRP" type="number" required="required"
                wire:model.live="mrp" />
            <x-form.element.input1 name="gstPercentage" label="GST Percentage" required="required" type="number"
                wire:model="gstPercentage" />
            @else
            <div class="bg-yellow-50 border-3 border-indigo-500 rounded-lg">
                <div class="bg-indigo-500 text-white font-bold p-3 rounded-t-sm border-b-1">
                    <h2>{{ $product['name'] }}</h2>
                </div>
                <div class="p-3 ">
                    <h4>{{ $product['description'] }}</h4>
                    <p>HSN Code: {{ $product['hsn_code'] }}</p>
                    <p>MRP: {{ $mrp }}</p>
                    <p>GST Percentage: {{ $product['gst_percentage'] }}</p>
                </div>
                <div class="bg-indigo-500 text-white font-bold p-3 rounded-b-sm border-t-1">
                    <h2> Available Quantity : {{ $available_quantity }}</h2>
                </div>
            </div>
            @endif


            <x-form.element.input1 name="purchasePrice" label="Purchase Price" type="number" required="required" wire:model.live="purchasePrice" />
            <x-form.element.input1 name="purchaseInvoice" label="Purchase Invoice" type="file" wire:model.live="purchaseInvoice" />
            <x-form.element.input1 name="purchaseDate" label="Purchase Date" type="date" wire:model.live="purchaseDate" />
            <x-form.element.input1 name="salePrice" label="Sale Price" type="number" required="required" wire:model.live="salePrice" />
            <x-form.element.input1 name="quantity" label="Quantity" type="number" required="required" wire:model="quantity" />

        </x-grid.type.standard>
        <hr />
        <x-ui.button.small title="Submit" type="submit" wire:click="submit" />

    </x-card.element.body>
</x-card.type.standard>