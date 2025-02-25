<?php

namespace App\Http\Controllers\User;

use App\Models\State;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Models\Inventory;
use App\Models\SettingProduct;

class ProductController extends Controller
{
    public $business_id;
    public function __construct()
    {
        $this->business_id = Auth::guard('web')->user()->business_id;
    }
    public function index()
    {
        $data = Product::where('business_id', $this->business_id)
        ->withSum('inventory', 'quantity')
        ->get();
        $setting = SettingProduct::whereBusinessId($this->business_id)->firstOrCreate();
        return view('user.resources.product.index', compact('data', 'setting'));
    }

    public function inventory()
    {
        $business_id = Auth::guard('web')->user()->business_id;
        $available_data = Product::where('business_id', $business_id)
        ->withSum('inventory', 'quantity')
        ->latest()
        ->paginate();
        $data = Inventory::where('business_id', $business_id)
        ->with('product')
        ->latest()
        ->paginate();
        return view('user.resources.product.inventory', compact('data', 'available_data'));
    }

    public function create()
    {
        
        return view('user.resources.product.create');
    }

    public function show(string $id)
    {
        $business_id = Auth::guard('web')->user()->business_id;
        $data = Product::where('business_id', $business_id)->where('id', $id)->with('business')->firstOrFail();
        return view('user.resources.product.show', compact('data'));
    }
    public function showBarCode(string $id)
    {
        $business_id = Auth::guard('web')->user()->business_id;
        $data = Product::where('business_id', $business_id)->where('id', $id)->with('business')->firstOrFail();
        return view('user.resources.product.showBarCode', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('web')->user()->business_id;
        $data = Product::where('business_id', $business_id)->where('id', $id)->firstOrFail();
        return view('user.resources.product.edit', compact('data', 'states'));
    }

    public function update(ProductRequest $request, string $id)
    {
        Product::updateOrCreate(
            ['id' => $id],
            [
                'sku' => $request->sku,
                'hsn_code' => $request->hsn_code,
                'name' => $request->name,
                'description' => $request->description,
                'mrp' => $request->mrp,
                'sale_price' => $request->sale_price,
                'purchase_price' => $request->purchase_price,
                'quantity' => $request->quantity,
            ]
        );
        return redirect()->route('product.index')->with('success', 'Product data updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
