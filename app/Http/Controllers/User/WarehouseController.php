<?php

namespace App\Http\Controllers\User;

use App\Models\State;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseRack;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $business_id = Auth::guard('web')->user()->business_id;
        $data = Warehouse::where('business_id', $business_id)->get();
        return view('user.resources.warehouse.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('user.resources.warehouse.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $business_id = Auth::guard('web')->user()->business_id;
        $request->validate([
            'name' => 'required',
        ]);
        Warehouse::updateOrCreate([
            'business_id' => $business_id,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
            'state_id' => $request->state_id,
        ]);
        return redirect()->route('warehouse.index')->with('success', 'New warehouse added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Warehouse::whereId($id)->with('racks')->first();
        return view('user.resources.warehouse.show', compact('data'));
    }
    /**
     * Display the specified resource.
     */
    public function showRacks(string $id)
    {
        $data = Inventory::where('inventories.warehouse_rack_id', $id)
        ->with('product')
        ->select(['product_id', DB::raw("SUM(quantity) as quantity")])
        ->groupBy('product_id')
        ->get()
        ->paginate();
        return view('user.resources.warehouse.show_rack', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function addRacks(string $id)
    {
        $data = Warehouse::find($id);
        return view('user.resources.warehouse.add_racks', compact('data'));
        return $data;
    }
    public function storeRacks(Request $request, string $id)
    {
        if ($request->last_number - $request->start_number > 100) {
           return back()->with('error', 'you can not add more than 100 racks at a time');
        }
        $data = Warehouse::find($id);
        for ($i=$request->start_number; $i < $request->last_number+1; $i++) { 
            WarehouseRack::firstOrCreate([
                'warehouse_id'=>$id,
                'name'=>$request->prefix.$i.$request->suffix
            ]);
        }
        // return $request;
        return redirect()->route('warehouse.show', $id)->with('success', 'New Racks added successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
