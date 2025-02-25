<x-card.type.standard>
    <x-card.element.header>
        Add Product
    </x-card.element.header>
    <x-card.element.body>
        <x-grid.type.standard div="2">
            <x-form.element.input1 name="warehouse_id" label="Warehouse" type="select" :options="$warehouses"
                required="required" wire:model="warehouse_id" />
            <x-form.element.input1 name="warehouse_rack_number" label="Rack Number" wire:model="warehouse_rack_number" />
            <x-form.element.input1 name="sku" label="SKU (Unique number for product)" type="number"
                required="required" wire:model.live="sku" min="1000" />
            <x-form.element.input1 name="hsn_code" label="HSN Code" required="required" type="number"
                wire:model="hsn_code" />
            <x-form.element.input1 name="name" label="Title" required="required" wire:model="name" />
            <x-form.element.input1 name="description" label="Description" wire:model="description" />
            <x-form.element.input1 name="mrp" label="MRP" type="number" required="required"
                wire:model.live="mrp" />
            <x-form.element.input1 name="salePrice" label="Sale Price" type="number" required="required"
                wire:model.live="salePrice" />

            <x-form.element.input1 name="purchasePrice" label="Purchase Price" type="number" required="required"
                wire:model.live="purchasePrice" />
            <x-form.element.input1 name="quantity" label="Quantity" type="number" required="required"
                wire:model="quantity" />
            <x-form.element.input1 name="gstPercentage" label="GST Percentage" required="required" type="number"
                wire:model="gstPercentage" />
        </x-grid.type.standard>
        <hr />
        <x-ui.button.small title="Submit" type="submit" wire:click="submit" />

    </x-card.element.body>
</x-card.type.standard>
