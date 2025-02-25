<?php

namespace App\Livewire\User;

use App\Models\State;
use App\Models\Product;
use Livewire\Component;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\SettingProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Action\Order\CreateOrderAction;
use App\Helpers\Helper;
use App\Models\Warehouse;
use App\Models\WarehouseRack;
use Illuminate\Support\Facades\Session;

class CreateOrder extends Component
{
    public $business_id;
    public $sku;
    public $availability;
    public $discountPercentage;
    public $discountAmount;
    public $warehouses;
    public $productLocation;
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
    public $gstPercentage = 18;
    public $user_session;
    public $error_msg = '';
    public $product_error_msg = '';

    function mount()
    {
        $this->user_session = \Illuminate\Support\Facades\Session::get('user');
        $this->business_id = $this->user_session['login']['business_id'];
        $this->customers = Customer::all();
        $this->products = Product::all();
        $this->states = State::all();
        $this->business_detail = Business::whereId($this->business_id)->first();
        $this->warehouses = Warehouse::whereBusinessId($this->business_id)->get();

        $this->availability = 1;
    }

    public function render()
    {
        return view('livewire.user.create-order');
    }

    public function updatedSku($a)
    {
        $this->sku = $a;
        $product = Product::where('sku', $a)->where('business_id', $this->business_id)->first();
        // dd($product);
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
        Session::put('user', $this->user_session);
    }
    public function updatedProductLocation($a)
    {
        $this->racks = Inventory::leftJoin('warehouse_racks',  'inventories.warehouse_rack_id', 'warehouse_racks.id')
        // ->leftJoin('warehouse',  'warehouse_racks.warehouse_id', 'warehouse.id')
        ->where('warehouse_racks.warehouse_id', $a)
        ->where('inventories.product_id', $this->product['id'])
        ->with('product', 'warehouseRack')
        ->select(['product_id', 'warehouse_rack_id as id', 'warehouse_racks.name', DB::raw("SUM(quantity) as quantity")])
        ->groupBy('product_id', 'warehouse_rack_id', 'warehouse_racks.name')
        ->get();
        Session::put('user', $this->user_session);
    }
    public function updatedProductRack($a)
    {
        $this->product['rack_id'] = $a;
        // dd($a);

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
        // dd($this->salePrice);
        $this->discountPercentage = 100 - 100 * ($this->salePrice / $this->mrp);

        Session::put('user', $this->user_session);
    }
    public function updatedSalePrice($a)
    {
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


        $err = 0;

        if ($this->product['name'] == '') {
            $this->product_error_msg = "Please enter product name";
            $err++;
        } elseif ($this->product['description'] == '') {
            $this->product_error_msg = "Please enter description name";
            $err++;
        } elseif ($this->mrp == 0) {
            $this->product_error_msg = "Please enter MRP";
            $err++;
        } elseif ($this->salePrice == 0) {
            $this->product_error_msg = "Please enter sale_price";
            $err++;
        } elseif ($this->product['gst_percentage'] == 0) {
            $this->product_error_msg = "Please enter gst_percentage";
            $err++;
        } elseif ($this->product['hsn_code'] == '') {
            $this->product_error_msg = "Please enter hsn_code";
            $err++;
        } else {
            $this->product_error_msg = "";
        }
        if ($err == 0) {
            DB::beginTransaction();
            try {
                $settings = SettingProduct::whereBusinessId($this->business_detail['id'])->firstOrCreate();
                // dd($settings->add_product_while_order);
                $product = Product::where([
                    'sku' => $this->sku,
                    'business_id' => $this->business_detail['id'],
                    'mrp' => $this->mrp,
                ])->first();
                // dd($this->product);
                $available_data = Product::where('sku', $this->sku)
                    ->withSum('inventory', 'quantity')
                    ->latest()->get();
                // dd($available_data);
                if ($product == null) {

                    $product = Product::updateOrCreate(
                        [
                            'sku' => $this->sku,
                            'business_id' => $this->business_detail['id'],
                            'mrp' => $this->mrp,
                        ],
                        [
                            'name' => $this->product['name'],
                            'description' => $this->product['description'],
                            'hsn_code' => $this->product['hsn_code'],
                            'sale_price' => $this->salePrice,
                            'gst_percentage' => $this->product['gst_percentage'],
                        ]
                    );
                    $this->product['id'] = $product['id'];
                    $inv = new Inventory();
                    $inv->business_id = $this->business_detail['id'];
                    $inv->product_id = $product['id'];
                    $inv->warehouse_rack_id = $product['rack_id'];
                    $inv->quantity = $this->quantity;
                    $inv->purchase_price = $this->salePrice;
                    $inv->save();
                }
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
                $this->product['name'] = '';
                $this->product['description'] = '';
                $this->mrp = 0;
                $this->salePrice = 0;
                $this->discountPercentage = 0;
                $this->discountAmount = 0;
                $this->product['gst_percentage'] = 0;
                $this->product['hsn_code'] = '';
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->product_error_msg = "Please provide product detail";
                throw $th;
            }
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
            $business_id = Auth::guard('web')->user()->business_id;
            $action = new CreateOrderAction($business_id);
            $action->createOrder($this->customer_detail, $this->business_detail, $this->added_products);
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
