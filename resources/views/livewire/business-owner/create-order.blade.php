<div>

    <style>
        .wire_loading {
            width: 100%;
            height: 100%;
            background: black;
            opacity: .1;
            position: fixed;
            top: 0;
        }

        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            position: relative;
            left: 40%;
            top: 50%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <x-grid.type.standard>

        @if (count($added_products) > 0)
            <x-ui.button.small title="Generate {{$taxTypeId == 1 ? 'Non GST' : 'GST'}} Invoice" type="submit" wire:click="submit" style="{{$taxTypeId == 1 ? 'non_gst' : 'gst'}}" />


            <x-table.type.responsive title="Added Product" style="{{$taxTypeId == 1 ? 'non_gst' : 'gst'}}">

                <x-table.element.thead>
                    <x-table.element.tr>
                        {{-- <x-resources.invoice.index-th /> --}}
                        <x-table.element.th data="Serial No." />
                        <x-table.element.th data="SKU" />
                        <x-table.element.th data="Description" />
                        <x-table.element.th data="Price" />
                        <x-table.element.th data="GST" />
                        <x-table.element.th data="Quantity" />
                        <x-table.element.th data="Unit" />
                        <x-table.element.th data="Total" />
                        <x-table.element.th data="Action" />
                    </x-table.element.tr>
                </x-table.element.thead>

                <x-table.element.tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($added_products as $key => $i)
                        <x-table.element.tr>
                            {{-- <x-resources.invoice.index-td :data="$i" /> --}}
                            <x-table.element.td data="{{ $key + 1 }}" />
                            <x-table.element.td :data="$i['sku']" />
                            <x-table.element.td>
                                {{ $i['name'] }} <br>
                                {{ $i['description'] }}
                            </x-table.element.td>
                            <x-table.element.td
                                data="{{ Helper::customMoneyFormat($i['sale_price'] / (1 + 0.01 * $i['gst_percentage'])) }}" />
                            <x-table.element.td
                                data="{{ Helper::customMoneyFormat($i['sale_price'] - $i['sale_price'] / (1 + 0.01 * $i['gst_percentage'])) }}" />
                            <x-table.element.td data="{{ $i['quantity'] }}" />
                            <x-table.element.td data="{{ $i['unit'] }}" />
                            <x-table.element.td data="{{ $i['sale_price'] * $i['quantity'] }}" />
                            <x-table.element.td>
                                <span wire:click=removeProduct({{ $key }})>
                                    <i class="fas fa-window-close"></i>
                                </span>
                            </x-table.element.td>
                        </x-table.element.tr>
                        @php
                            $total += $i['sale_price'] * $i['quantity'];
                        @endphp
                    @empty
                        <x-table.element.tr>
                            <x-table.element.td colspan="9" data="No Data Found" />
                        </x-table.element.tr>
                    @endforelse
                    <x-table.element.tr>
                        <x-table.element.td colspan="7" data="Sub Total" />
                        <x-table.element.td colspan="1" data="{{ $total }}" />
                        <x-table.element.td colspan="1" data="" />
                    </x-table.element.tr>
                </x-table.element.tbody>

            </x-table.type.responsive>
        @else
        <div class="border rounded">
            <x-form.element.input1 name="taxTypeId" label="Tax Type" type="select" :options="$taxTypes"
                required="required" wire:model.live="taxTypeId" />
        </div>
        @endif
        <span class="text-red-500">{{ $error_msg }}</span>

        
        <div class="grid grid-cols-2 gap-4">

            @php
                $location = (object) [
                    (object) ['id' => 1, 'name' => 'store'],
                    (object) ['id' => 2, 'name' => 'warehouse'],
                ];
            @endphp
            <x-form.type.standard title="Add Product" class="bg-red-100">
                <x-slot:right_header>
                    {{-- <x-form.element.button1 title="Add Now" type="add" wire:click="addProduct" /> --}}
                </x-slot:right_header>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="col-span-2">

                        <x-form.element.input1 name="sku" label="Select Product" required="required"
                            wire:model.live="sku" />
                    </div>
                    
                    @if ($product != null)
                        <x-form.element.input1 name="warehouse" label="Warehouse" type="select" :options="$warehouses"
                            required="required" wire:model.live="warehouse" />
                        <x-form.element.input1 name="productRack" label="Rack" type="select" :options="$racks"
                            required="required" wire:model.live="productRack" />
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
                    <x-form.element.input1 name="salePrice" label="Sale Price" type="number" required="required"
                        wire:model.live="salePrice" />
                    <x-form.element.input1 name="discountPercentage" label="Percentage Discount" type="number"
                        required="required" wire:model.live="discountPercentage" />
                    <x-form.element.input1 name="discountAmount" label="Discount" type="number" required="required"
                        wire:model.live="discountAmount" />
                    <x-form.element.input1 name="quantity" label="Quantity" type="number" required="required"
                        wire:model="quantity" />
                    <x-form.element.input1 name="unit" label="Unit" wire:model="unit" />
                    <x-form.element.input1 name="product.gst_percentage" label="GST Percentage" required="required"
                        type="number" wire:model="product.gst_percentage" />
                </div>
                <hr />
                
                @if ($available_quantity > 0)
                    <x-ui.button.small title="Add Now" wire:click="addProduct" />
                @endif
                <span class="text-danger">{{ $product_error_msg }}</span>
            </x-form.type.standard>
            <div class="grid grid-cols-1 gap-4">

                <x-form.type.standard title="Customer">

                    <x-form.element.input1 name="phone" label="Phone" required="required"
                        wire:model.live="selectedCustomer" />
                    <x-form.element.input1 name="name" label="Name" required="required"
                        wire:model="customer_detail.name" />
                    <x-form.element.input1 name="gstin" label="GSTIN" wire:model="customer_detail.gstin" />
                    <x-form.element.input1 name="email" label="Email" wire:model="customer_detail.email" />
                    <x-form.element.input1 name="address" label="Address" wire:model="customer_detail.address"
                        div="1" />
                    <x-form.element.input1 name="city" label="City" wire:model="customer_detail.city" />
                    <x-form.element.input1 name="pin" label="Pin" wire:model="customer_detail.pin" />
                    <x-form.element.input1 name="state_id" label="State" type="select" :options="$states"
                        required="required" wire:model="customer_detail.state_id" />
                </x-form.type.standard>
            </div>

        </div>

        <div wire:loading>
            <div class="wire_loading">

                <div class="loader"></div>
            </div>
        </div>

    </x-grid.type.standard>







</div>
