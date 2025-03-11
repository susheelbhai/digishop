<?php

namespace App\Http\Controllers\BusinessOwner;

use App\Models\Order;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public $business_id;
    public function __construct()
    {
        // $this->middleware('has_balance', ['only' => ['create']]);
    }
    public function index()
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
         $data = Order::where('business_id', $business_id)
        ->withSum([
            'products' => fn ($query) => $query->select(DB::raw('sum(quantity*sale_price*(1+0.01*gst_percentage))'))
        ], 'amount')
        ->latest()->get();
        return view('user.resources.order.index', compact('data'));
    }

    public function create()
    {
        $states = State::all();
        return view('user.resources.order.create', compact('states'));
    }

    public function store(Request $request)
    {
        Order::updateOrCreate([
            'sku' => $request->sku,
            'name' => $request->name,
            'description' => $request->description,
            'mrp' => $request->mrp,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'quantity' => $request->quantity,
            'business_id' => Auth::guard('business_owner')->user()->business_id,
        ]);
        return redirect()->route('order.index')->with('success', 'New order added successfully');
    }

    public function show(string $id)
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = Order::where('business_id', $business_id)
        ->where('id', $id)
        ->with('business', 'products')
        ->firstOrFail();
        // return $data;
        return view('user.resources.order.show', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = Order::where('business_id', $business_id)->where('id', $id)->firstOrFail();
        return view('user.resources.order.edit', compact('data', 'states'));
    }

    public function update(Request $request, string $id)
    {
        Order::updateOrCreate(
            ['id' => $id],
            [
                'sku' => $request->sku,
                'name' => $request->name,
                'description' => $request->description,
                'mrp' => $request->mrp,
                'sale_price' => $request->sale_price,
                'purchase_price' => $request->purchase_price,
                'quantity' => $request->quantity,
            ]
        );
        return redirect()->route('order.index')->with('success', 'Order data updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
