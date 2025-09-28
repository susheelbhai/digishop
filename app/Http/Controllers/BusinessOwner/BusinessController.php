<?php

namespace App\Http\Controllers\BusinessOwner;

use App\Models\State;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\SubscriptionType;
use App\Events\ApplicationReceived;
use App\Http\Controllers\Controller;
use App\Models\BusinessUserRelation;
use Illuminate\Support\Facades\Auth;
use App\Contracts\BusinessOnboardApplicationContract;
use App\Http\Requests\StoreBusinessRequest;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    
    public function index()
    {
        $user_id = Auth::guard('business_owner')->user()->id;
        $data = BusinessUserRelation::where('user_id', $user_id)
       ->with('business', 'user')
       ->get();
        return view('user.resources.business.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        return view('user.resources.business.create', compact('states', 'subscription_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessRequest $request)
    {
        // return $request;
        $data = new Business();
        DB::beginTransaction();
        try {
            $created = $data->create($request->validated());
            BusinessUserRelation::updateOrCreate([
                'business_id' => $created->id,
                'user_id' => Auth::user()->id,
            ]);
            if($request->hasFile('gst_certificate') && $request->file('gst_certificate')->isValid()){
                $created->addMediaFromRequest('gst_certificate')->toMediaCollection('gst_certificate');
            }
            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                $created->addMediaFromRequest('logo')->toMediaCollection('logo');
            }
            if($request->hasFile('registration_certificate') && $request->file('registration_certificate')->isValid()){
                $created->addMediaFromRequest('registration_certificate')->toMediaCollection('registration_certificate');
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
        return redirect()->route('business.index')->with('success', 'Business onboard application submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Business::find($id);
        return view('user.resources.business.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        $data = Business::find($id);
        return view('user.resources.business.edit', compact('data', 'states', 'subscription_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'pin' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'gst_number' => 'nullable|string|max:50',
            'pan_number' => 'nullable|string|max:50',
            'subscription_type_id' => 'required|exists:subscription_types,id',
            'bank_account_number' => 'nullable|string|max:50',
            'bank_ifsc_code' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
            'bank_branch' => 'nullable|string|max:255',
        ]);

        // return $request;
        $data = Business::find($id);
        DB::beginTransaction();
        try {
            $data->update($validated);
            if($request->hasFile('gst_certificate') && $request->file('gst_certificate')->isValid()){
                $data->addMediaFromRequest('gst_certificate')->toMediaCollection('gst_certificate');
            }
            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                $data->addMediaFromRequest('logo')->toMediaCollection('logo');
            }
            if($request->hasFile('registration_certificate') && $request->file('registration_certificate')->isValid()){
                $data->addMediaFromRequest('registration_certificate')->toMediaCollection('registration_certificate');
            }
            if($request->hasFile('authorised_sign') && $request->file('authorised_sign')->isValid()){
                $data->addMediaFromRequest('authorised_sign')->toMediaCollection('authorised_sign');
            }
            if($request->hasFile('authorised_stamp') && $request->file('authorised_stamp')->isValid()){
                $data->addMediaFromRequest('authorised_stamp')->toMediaCollection('authorised_stamp');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect()->route('business.index')->with('success', 'Business details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
