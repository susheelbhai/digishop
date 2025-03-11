<?php

namespace App\Http\Controllers\BusinessOwner;

use App\Models\State;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\BusinessEmployee;
use App\Repository\GstRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniquePhoneForBusiness;
use App\Rules\UniquePhoneForBusinessEmployee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = BusinessEmployee::where('business_id', $business_id)->get();
        return view('user.resources.employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('user.resources.employee.create', compact('states'));
    }

    public function store(Request $request)
    {
        // return $request;
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $employee_count = BusinessEmployee::whereBusinessId($business_id)->count();
        $login_id = $business_id+1000 . sprintf('%02d', $employee_count+1);
        $request->validate([
            'phone' => [ new UniquePhoneForBusinessEmployee() ],
        ]);
        BusinessEmployee::updateOrCreate([
            'login_id' => $login_id,
            'password' => Hash::make(rand(111111111111,999999999999)),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => Helper::cleanPhone($request->phone),
            'address' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
            'state_id' => $request->state_id,
            'business_id' => Auth::guard('business_owner')->user()->business_id,
        ]);
        return redirect()->route('employee.index')->with('success', 'New employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = BusinessEmployee::where('business_id', $business_id)->where('id', $id)->with('state')->firstOrFail();
        return view('user.resources.employee.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = BusinessEmployee::where('business_id', $business_id)->where('id', $id)->firstOrFail();
        return view('user.resources.employee.edit', compact('data', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'phone' => [ new UniquePhoneForBusiness($id) ],
        ]);
        $repo = new GstRepository();
        // return $repo->getInfo('10AAKCD4337Q1ZF');
        BusinessEmployee::updateOrCreate(
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
        return redirect()->route('employee.index')->with('success', 'BusinessEmployee data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
