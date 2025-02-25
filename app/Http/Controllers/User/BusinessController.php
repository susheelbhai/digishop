<?php

namespace App\Http\Controllers\User;

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
        $user_id = Auth::guard('web')->user()->id;
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
