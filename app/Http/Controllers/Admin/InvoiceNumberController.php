<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceNumberFormat;
use Illuminate\Http\Request;

class InvoiceNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InvoiceNumberFormat::all();
        return view('admin.resources.invoice_number.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resources.invoice_number.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new InvoiceNumberFormat();
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->sample1 = $request->sample1;
        $obj->sample2 = $request->sample2;
        $obj->sample3 = $request->sample3;
        $obj->save();
        return redirect()->route('admin.invoiceNumber.index')->with('success', 'Invoice Number Format submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = InvoiceNumberFormat::find($id);
        return view('admin.resources.invoice_number.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = InvoiceNumberFormat::find($id);
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->sample1 = $request->sample1;
        $obj->sample2 = $request->sample2;
        $obj->sample3 = $request->sample3;
        $obj->save();
        return redirect()->route('admin.invoiceNumber.index')->with('success', 'Invoice Number Format updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
