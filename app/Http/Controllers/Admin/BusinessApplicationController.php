<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Models\SubscriptionType;
use App\Repository\BankRepository;
use App\Events\ApplicationReceived;
use App\Http\Controllers\Controller;
use App\Models\BusinessOnboardApplication;
use App\Contracts\BusinessOnboardApplicationContract;
use App\Http\Requests\BusinessOnboardApplicationRequest;

class BusinessApplicationController extends Controller
{
    public $repo;
    public function __construct(BusinessOnboardApplicationContract $repo) {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = BusinessOnboardApplication::all();
        return view('admin.resources.business_application.index', compact('data'));
    }

    public function create()
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        return view('admin.resources.business_application.create', compact('states', 'subscription_types'));
    }

    public function store(BusinessOnboardApplicationRequest $request)
    {
        $ifsc_repo = new BankRepository();
        $bank_name = $ifsc_repo->CheckIFSC($request['bank_ifsc']);
        $request['bank_name'] = $bank_name;

        $request['partner_id'] = null;
        $data = $this->repo->store($request);
        ApplicationReceived::dispatch($data);
        return redirect()->route('admin.business_application.index')->with('success', 'Business onboard application submitted successfully');
    }


    public function show(string $id)
    {
        $data = BusinessOnboardApplication::findOrFail($id);
        return view('admin.resources.business_application.show', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $subscription_types = SubscriptionType::all();
        $data = BusinessOnboardApplication::findOrFail($id);
        return view('admin.resources.business_application.edit', compact('data', 'states', 'subscription_types'));
    }

    public function update(Request $request, string $id)
    {
        $ifsc_repo = new BankRepository();
        $bank_name = $ifsc_repo->CheckIFSC($request['bank_ifsc']);
        $request['bank_name'] = $bank_name;
        $data = $this->repo->update($request, $id);
        return redirect()->route('admin.business_application.index')->with('success', 'Business onboard application updated successfully');
    }

    public function approve($id)
    {
        $data = $this->repo->approve($id);
        return $data;
    }

    public function reject($id)
    {
        // return $id;
        $data = $this->repo->reject($id);
        return $data;
    }

}
