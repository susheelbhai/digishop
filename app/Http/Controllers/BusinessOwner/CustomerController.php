<?php

namespace App\Http\Controllers\BusinessOwner;

use App\Models\State;
use App\Helpers\Helper;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repository\GstRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniquePhoneForBusiness;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public $business_id;
    public function __construct()
    {
    }
    public function index()
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = Customer::where('business_id', $business_id)->get();
        return view('user.resources.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('user.resources.customer.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        // return $request;
        $request->validate([
            'phone' => [ new UniquePhoneForBusiness() ],
        ]);
        Customer::updateOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'gstin' => $request->gstin,
            'phone' => Helper::cleanPhone($request->phone),
            'address' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
            'state_id' => $request->state_id,
            'business_id' => Auth::guard('business_owner')->user()->business_id,
        ]);
        return redirect()->route('customer.index')->with('success', 'New customer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = Customer::where('business_id', $business_id)->where('id', $id)->with('state')->firstOrFail();
        return view('user.resources.customer.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = Customer::where('business_id', $business_id)->where('id', $id)->firstOrFail();
        return view('user.resources.customer.edit', compact('data', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $request->validate([
            'phone' => [ new UniquePhoneForBusiness($id) ],
        ]);
        $repo = new GstRepository();
        // return $repo->getInfo('10AAKCD4337Q1ZF');
        Customer::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'gstin' => $request->gstin,
                'email' => $request->email,
                'phone' => Helper::cleanPhone($request->phone),
                'address' => $request->address,
                'city' => $request->city,
                'pin' => $request->pin,
                'state_id' => $request->state_id,
                'business_id' => Auth::guard('business_owner')->user()->business_id,
            ]
        );
        return redirect()->route('customer.index')->with('success', 'Customer data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
