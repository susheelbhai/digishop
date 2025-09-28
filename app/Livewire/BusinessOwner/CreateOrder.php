<?php

namespace App\Livewire\BusinessOwner;

use App\Models\State;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\TaxType;
use Livewire\Component;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Warehouse;
use App\Models\WarehouseRack;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Action\Order\CreateOrderAction;
use Illuminate\Support\Facades\Session;

class CreateOrder extends Component
{
    public $business_id;
    public $taxTypes;
    public $taxTypeId = 2;
    public $sku;
    public $available_quantity;
    public $discountPercentage;
    public $discountAmount;
    public $warehouses;
    public $warehouse;
    public $productRack;
    public $racks = [];
    public $mrp;
    public $salePrice;
    public $added_products = [];
    public $product = [];
    public $states;
    public $products;
    public $customers;
    public $selectedCustomer;
    public $customer_detail = [];
    public $business_detail;
    public $quantity = 1;
    public $unit = '';
    public $gstPercentage = 18;
    public $user_session;
    public $error_msg = '';
    public $product_error_msg = '';


    protected $rules = [
        'sku' => 'required|min:4',
        'warehouse' => 'required',
        'productRack' => 'required',
        'quantity' => 'required|numeric|gt:0|lte:available_quantity',
        'salePrice' => 'required|numeric|gt:0|lte:mrp',
        'product.gst_percentage' => 'required|numeric',
    ];

    function mount()
    {
        $this->user_session = Session::get('user');
        $this->business_id = $this->user_session['login']['business_id'];
        $this->customers = Customer::all();
        $this->products = Product::all();
        $this->states = State::all();
        $this->taxTypes = TaxType::get();
        $this->business_detail = Business::whereId($this->business_id)->first();
        $this->warehouses = Warehouse::whereBusinessId($this->business_id)->get();

        $this->available_quantity = 0;
    }

    public function render()
    {
        return view('livewire.business-owner.create-order');
    }

    public function updatedSku($a)
    {
        $this->sku = $a;
        $product = Product::where('sku', $a)->where('business_id', $this->business_id)->latest()->first();
        $this->product['name'] = $product['name'] ?? '';
        $this->product['sku'] = $a ?? '';
        $this->product['description'] = $product['description'] ?? '';
        $this->mrp = $product['mrp'] ?? '';
        $this->salePrice = $product['sale_price'] ?? '';
        $this->discountPercentage = 100 - 100 * ($product['sale_price'] ?? 0) / ($product['mrp'] ?? 1);
        $this->discountAmount = ($product['mrp'] ?? 0) - ($product['sale_price'] ?? 0);
        $this->product['gst_percentage'] = $product['gst_percentage'] ?? '';
        $this->product['hsn_code'] = $product['hsn_code'] ?? '';
        $this->product['id'] = $product['id'] ?? '';
        $this->updatedWarehouse($this->warehouse);
        Session::put('user', $this->user_session);
    }
    public function updatedWarehouse($a)
    {
        $this->racks = WarehouseRack::where('warehouse_id', $a)
            ->whereHas('warehouse', function ($query) {
                $query->where('business_id', $this->business_id);
            })
            ->whereHas('inventories', function ($query) {
                $query->where('product_id', $this->product['id']);
            })
            ->withSum(['inventories as inventories_sum_quantity' => function ($query) {
                $query->where('product_id', $this->product['id']); // Sum only for the specific product_id
            }], 'quantity')
            ->having('inventories_sum_quantity', '>', 0)
            ->get();
        $this->available_quantity = 0;
        $this->productRack = null;

        Session::put('user', $this->user_session);
    }
    public function updatedProductRack($a)
    {
        if ($a == "") {
            return;
        }
        // dd($a);
        $rack = WarehouseRack::where('id', $a)
        ->whereHas('warehouse', function ($query) {
            $query->where('business_id', $this->business_id);
        })
        ->whereHas('inventories', function ($query) {
            $query->where('product_id', $this->product['id']);
            $query->where('tax_type_id', $this->taxTypeId);
        })
        ->with(['inventories' => function ($query) {
            $query->where('product_id', $this->product['id']);
            $query->where('tax_type_id', $this->taxTypeId);
        }])
        ->withSum(['inventories as inventories_sum_quantity' => function ($query) {
           $query->where('product_id', $this->product['id']);
            $query->where('tax_type_id', $this->taxTypeId);
        }], 'quantity')
        ->first();
            // dd($rack);
            $key = "id"; // The key to check for
            $added_quantity = 0;
            // $result = array_filter($this->added_products, function ($subArray) use ($key) {
            //     return isset($subArray[$key]) && $subArray[$key] == $this->product['id'];
            // });
            // $result = array_values($result);

            // if (count($result) >= 1) {
            // $added_quantity = $result[0]['quantity'];
            // # code...
            // }

            // array_filter returns an array, so you may need to reindex it
        $this->available_quantity = $rack?->inventories_sum_quantity -  $added_quantity;
        $this->product['rack_id'] = $a;

        Session::put('user', $this->user_session);
    }
    public function updatedTaxTypeId($a)
    {
        $this->taxTypeId = $a;
        $this->updatedProductRack($this->productRack);
        Session::put('user', $this->user_session);
    }
    public function updatedDiscountPercentage($a)
    {
        $this->discountPercentage = $this->trimZero($a);
        $this->salePrice = $this->mrp * (1 - $a * .01);
        $this->discountAmount = $this->mrp - $this->salePrice ?? '';

        Session::put('user', $this->user_session);
    }
    public function updatedDiscountAmount($a)
    {
        $this->discountAmount = $this->trimZero($a);
        $this->salePrice = ($this->mrp ?? 0) - $a;
        $this->discountPercentage = 100 - 100 * ($this->salePrice / $this->mrp);

        Session::put('user', $this->user_session);
    }
    public function updatedSalePrice($a)
    {
        if ($a == '') {
            $a = 0;
        }
        $this->salePrice = $this->trimZero($a);
        $this->discountAmount = ($this->mrp ?? 0) - ($a ?? 0);
        $this->discountPercentage = 100 * (1 - ($this->salePrice ?? 0) / ($this->mrp ?? 1));

        Session::put('user', $this->user_session);
    }
    public function updatedMrp($a)
    {
        $this->mrp = $this->trimZero($a);
        $this->discountAmount = ($a ?? 0) - ($this->salePrice ?? 0);
        $this->discountPercentage = 100 * (1 - ($this->salePrice ?? 0) / ($this->mrp ?? 1));

        Session::put('user', $this->user_session);
    }
    public function updatedSelectedCustomer($a)
    {
        $a = $this->selectedCustomer = Helper::cleanPhone($a);
        $customer_detail = Customer::where('phone', $a)->first();
        $this->customer_detail['name'] = $customer_detail['name'] ?? '';
        $this->customer_detail['gstin'] = $customer_detail['gstin'] ?? '';
        $this->customer_detail['email'] = $customer_detail['email'] ?? '';
        $this->customer_detail['phone'] = $a ?? '';
        $this->customer_detail['address'] = $customer_detail['address'] ?? '';
        $this->customer_detail['city'] = $customer_detail['city'] ?? '';
        $this->customer_detail['pin'] = $customer_detail['pin'] ?? '';
        $this->customer_detail['state_id'] = $customer_detail['state_id'] ?? $this->business_detail['state_id'];
        Session::put('user', $this->user_session);
    }

    public function addProduct()
    {
        $customAttributes = [
            'product.gst_percentage' => 'Gst Percentage',
        ];
        $this->validate($this->rules, [], $customAttributes); // Use the custom attribute mapping here
        DB::beginTransaction();
            try {
                $array = $this->added_products;
                $key = "sku"; // The key to check for

                // Use array_filter to find the array with the specified key-value pair
                $result = array_filter($this->added_products, function ($subArray) use ($key) {
                    return isset($subArray[$key]) && $subArray[$key] == $this->sku;
                });

                // array_filter returns an array, so you may need to reindex it
                $result = array_values($result);
                if (count($result) == 0) {
                    $new = [
                        'id' => $this->product['id'],
                        'warehouse_rack_id' => $this->product['rack_id'],
                        'sku' => $this->product['sku'],
                        'name' => $this->product['name'],
                        'description' => $this->product['description'],
                        'mrp' => $this->mrp,
                        'sale_price' => $this->salePrice,
                        'hsn_code' => $this->product['hsn_code'],
                        'quantity' => $this->quantity,
                        'unit' => $this->unit,
                        'gst_percentage' => $this->product['gst_percentage'],
                    ];
                    array_push($this->added_products, $new);
                } else {
                    $searchValue = $this->sku; // The value to search for
                    $updateKey = "quantity";   // The column to update
                    $newValue = $this->quantity + $result[0][$updateKey];       // The new value to set

                    // Use array_map to update the column where the key has the specific value
                    $array = array_map(function ($subArray) use ($key, $searchValue, $updateKey, $newValue) {
                        if (isset($subArray[$key]) && $subArray[$key] == $searchValue) {
                            $subArray[$updateKey] = $newValue;
                        }
                        return $subArray;
                    }, $array);
                    $this->added_products = $array;
                }

                $this->sku = '';
                $this->mrp = 0;
                $this->salePrice = 0;
                $this->discountPercentage = 0;
                $this->discountAmount = 0;
                $this->unit = '';
                $this->product = null;
                $this->available_quantity = 0;

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->product_error_msg = "Please provide product detail";
                throw $th;
            }
        Session::put('user', $this->user_session);
    }

    public function removeProduct($key)
    {
        array_splice($this->added_products, $key, 1);
        Session::put('user', $this->user_session);
    }

    public function submit()
    {
        $product_count = count($this->added_products);

        if ($product_count == 0) {
            $this->error_msg = "Please select at least 1 product";
        } elseif ($this->customer_detail == null) {
            $this->error_msg = "Please select customer detail";
        } else {
            $this->error_msg = '';
            $business_id = Auth::guard('business_owner')->user()->business_id;
            $action = new CreateOrderAction($business_id, $this->taxTypeId);
            $action->createGstOrder($this->customer_detail, $this->business_detail, $this->added_products);
            return redirect()->route('order.index');
        }
    }

    private function trimZero($a)
    {
        if ($a == '') {
            $a = 0;
        }
        if ($a > 0) {
            $a = ltrim($a, '0');
        }
        return $a;
    }
}
