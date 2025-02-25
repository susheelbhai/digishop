<?php

namespace App\Http\Controllers\Partner;

use App\Contracts\BusinessOnboardApplicationContract;
use App\Events\ApplicationReceived;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessOnboardApplication;
use App\Http\Requests\BusinessOnboardApplicationRequest;
use App\Models\SubscriptionType;

class BusinessApplicationController extends Controller
{
    public $repo;
    public function __construct(BusinessOnboardApplicationContract $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = BusinessOnboardApplication::where('partner_id', Auth::guard('partner')->id())->get();
        return view('partner.resources.business_application.index', compact('data'));
    }

    public function create()
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        return view('partner.resources.business_application.create', compact('states', 'subscription_types'));
    }

    public function store(BusinessOnboardApplicationRequest $request)
    {
        $request['partner_id'] = Auth::guard('partner')->id();
         $data = $this->repo->store($request);
        ApplicationReceived::dispatch($data);
        return redirect()->route('partner.business_application.index')->with('success', 'Business onboard application submitted successfully');
    }


    public function show(string $id)
    {
        $data = BusinessOnboardApplication::findOrFail($id);
        if ($data['partner_id'] != Auth::guard('partner')->user()->id) {
            abort('403');
        }
        return view('partner.resources.business_application.show', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        $data = BusinessOnboardApplication::findOrFail($id);
        if ($data['partner_id'] != Auth::guard('partner')->user()->id) {
            abort('403');
        }
        return view('partner.resources.business_application.edit', compact('data', 'states', 'subscription_types'));
    }

    public function update(Request $request, string $id)
    {
        $partner_id = BusinessOnboardApplication::find($id)->partner_id;
        if ($partner_id != Auth::guard('partner')->user()->id) {
            abort('403');
        }
        $data = $this->repo->update($request, $id);
        return redirect()->route('partner.business_application.index')->with('success', 'Business onboard application updated successfully');
    }
}
