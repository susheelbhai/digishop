<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Business;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessOnboardApplication;
use App\Models\SubscriptionType;

class BusinessController extends Controller
{
    public function index(): View
    {
        $data = Business::all();
        return view('admin.resources.business.index', compact('data'));
    }



    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $data = Business::whereId($id)->first();
        return view('admin.resources.business.show', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        $data = Business::findOrFail($id);
        return view('admin.resources.business.edit', compact('data', 'states', 'subscription_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subscription_type_id' => 'required|exists:subscription_types,id',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'pin' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'subscription_type_id' => 'nullable|exists:subscription_types,id',
            'bank_account_number' => 'nullable|string|max:50',
            'bank_account_holder_name' => 'nullable|string|max:255',
            'bank_ifsc' => 'nullable|string|max:20',
            'bank_swift' => 'nullable|string|max:20',
            // Add other fields as necessary
        ]);
        // dd($request->all());

        $data = Business::findOrFail($id);
        if ($request->hasFile('logo')) {
            $data->addMediaFromRequest('logo')
                ->preservingOriginal()
                ->toMediaCollection('logo');
        }
        
        $data = Business::findOrFail($id);
        if ($request->hasFile('registration_certificate')) {
            $data->addMediaFromRequest('registration_certificate')
                ->preservingOriginal()
                ->toMediaCollection('registration_certificate');
        }
        if ($request->hasFile('gst_certificate')) {
            $data->addMediaFromRequest('gst_certificate')
                ->preservingOriginal()
                ->toMediaCollection('gst_certificate');
        }
        if ($request->hasFile('authorised_sign')) {
            $data->addMediaFromRequest('authorised_sign')
                ->preservingOriginal()
                ->toMediaCollection('authorised_sign');
        }
        if ($request->hasFile('authorised_stamp')) {
            $data->addMediaFromRequest('authorised_stamp')
                ->preservingOriginal()
                ->toMediaCollection('authorised_stamp');
        }
        if ($request->hasFile('owner_photo')) {
            $data->addMediaFromRequest('owner_photo')
                ->preservingOriginal()
                ->toMediaCollection('owner_photo');
        }
        $data->update($validated);

        return redirect()->route('admin.business.index')->with('success', 'Business updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
