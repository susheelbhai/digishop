<?php

namespace App\Livewire\BusinessOwner;

use App\Models\Product;
use Livewire\Component;
use App\Models\Business;
use App\Models\Inventory;
use App\Models\SettingProduct;
use App\Models\Warehouse;
use App\Models\WarehouseRack;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\TaxType;

class ProductCreate extends Component
{
    public $business_id;
    public $sku;
    public $available_quantity;
    public $mrp;
    public $salePrice;
    public $purchasePrice;
    public $hsn_code;
    public $warehouse_id;
    public $warehouse_rack_number;
    public $description;
    public $name;
    public $product = null;
    public $business_detail;
    public $quantity = 1;
    public $gstPercentage;
    public $warehouses;
    public $user_session;
    public $error_msg = [];
    public $taxTypes;
    public $taxTypeId;

    function mount()
    {
        $this->user_session = \Illuminate\Support\Facades\Session::get('user');
        $this->business_id = $this->user_session['login']['business_id'];
        $business_id = $this->user_session['login']['business_id'];
        $this->taxTypes = TaxType::get();

        $this->business_detail = Business::whereId($business_id)->first();
        $this->warehouses = Warehouse::whereBusinessId($business_id)->get();
        $settings = SettingProduct::whereBusinessId($business_id)->firstOrCreate();
        $this->gstPercentage = $settings->default_gst_percentage;


        $this->available_quantity = 0;
    }
    public function render()
    {
        // dd($this->warehouses );
        return view('livewire.business-owner.product-create');
    }

    public function updatedSku($a)
    {
        $this->sku = $a;
        $product = Product::where('sku', $a)
        ->where('business_id', $this->business_id)
        ->withSum('inventory', 'quantity')
        ->latest()
        ->first();
        $this->name = $product['name'] ?? '';
        $this->description = $product['description'] ?? '';
        $this->mrp = $product['mrp'] ?? '';
        $this->salePrice = $product['sale_price'] ?? '';
        $this->gstPercentage = $product['gst_percentage'] ?? '';
        $this->hsn_code = $product['hsn_code'] ?? '';
        Session::put('user', $this->user_session);
        $this->product = $product;
        $this->available_quantity = $product['inventory_sum_quantity'] ?? 0;
        // dd($product);
    }
    
    public function updatedTaxTypeId($a)
    {
        $this->taxTypeId = $a;
        Session::put('user', $this->user_session);
    }

    public function submit()
    {
        $this->validate();
        // dd($this->taxTypeId);
        $rack = WarehouseRack::firstOrCreate([
            'warehouse_id' => $this->warehouse_id,
            'name' => $this->warehouse_rack_number,
        ]);
        DB::beginTransaction();

        try {
            $product = Product::updateOrCreate(
                [
                    'sku' => $this->sku,
                    'business_id' => $this->business_detail['id'],
                    'mrp' => $this->mrp,
                ],
                [
                    'name' => $this->name,
                    'description' => $this->description,
                    'sale_price' => $this->salePrice,
                    'hsn_code' => $this->hsn_code,
                    'gst_percentage' => $this->gstPercentage,
                ]
            );
            $inv = new Inventory();
            $inv->business_id = $this->business_detail['id'];
            $inv->tax_type_id = $this->taxTypeId;
            $inv->warehouse_rack_id = $rack['id'];
            $inv->product_id = $product['id'];
            $inv->quantity = $this->quantity;
            $inv->purchase_price = $this->purchasePrice;
            $inv->save();
            DB::commit();
            return redirect()->route('product.index')
                ->with('product_id', $product['id'])
                ->with('success', 'New product added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    protected function rules()
    {
        return [
            'sku' => 'required|numeric|min:1000|max:9999999999',
            'hsn_code' => 'required|min:4',
            'name' => 'required|min:6',
            'quantity' => 'required|numeric|min:1',
            'mrp' => 'required|numeric|min:1',
            'purchasePrice' => 'required|numeric|min:1',
            'salePrice' => 'required|numeric|min:1|lte:mrp',
            'gstPercentage' => 'required|numeric|min:1',
            'warehouse_id' => 'required',
            'warehouse_rack_number' => 'required|min:1',
        ];
    }
}
