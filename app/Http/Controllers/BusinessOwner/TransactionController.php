<?php

namespace App\Http\Controllers\BusinessOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Susheelbhai\Larapay\Models\Payment;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
         $data = Transaction::where('business_id', $business_id)->latest()->get();
         $payments = Payment::where('business_id', $business_id)->latest()->get();
        return view('user.resources.transaction.index', compact('data', 'payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:100|max:9999',
        ]);
        return view('user.resources.transaction.checkout', compact('request'));
    }
    public function pay(Request $request)
    {
        
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
