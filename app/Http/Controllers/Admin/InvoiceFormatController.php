<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InvoiceFormat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class InvoiceFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InvoiceFormat::all();
        return view('admin.resources.invoice_format.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resources.invoice_format.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new InvoiceFormat();
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        if ($request->hasFile('image')) {
            $image_name = '/images/invoice_sample/'.uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/storage/images/invoice_sample/'), $image_name);
            $obj->image = $image_name;
            
        }
        $obj->save();
        return redirect()->route('admin.invoiceFormat.index')->with('success', 'Invoice Format submitted successfully');
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
        $data = InvoiceFormat::find($id);
        return view('admin.resources.invoice_format.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = InvoiceFormat::find($id);
        $image_name = $data['image'];
        // return $request;
        if ($request->hasFile('image')) {
            $image_name = '/images/invoice_sample/'.uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/storage/images/invoice_sample/'), $image_name);
            if ($data['image'] != 'dummy.png') {
                File::delete(public_path($data['image']));
            }
        }

        InvoiceFormat::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image_name,
        ]);
        return redirect()->route('admin.invoiceFormat.index')->with('success', 'Invoice Format updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
