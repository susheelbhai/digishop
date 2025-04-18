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
        // $this->updateInvoiceSample($data);
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
        $obj->state_code = $request->state_code;
        $obj->state_code_suffix = $request->state_code_suffix;
        $obj->financial_year = $request->financial_year;
        $obj->financial_year_hint = $request->financial_year_hint;
        $obj->financial_year_interfix = $request->financial_year_interfix;
        $obj->financial_year_suffix = $request->financial_year_suffix;
        $obj->business_order_id_digit = $request->business_order_id_digit;

        $obj->sample1 = $request->sample1;
        $obj->sample2 = $request->sample2;
        $obj->sample3 = $request->sample3;

        $obj->save();
        return redirect()->route('admin.invoiceNumber.index')->with('success', 'Invoice Number Format submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
        $obj->state_code = $request->state_code;
        $obj->state_code_suffix = $request->state_code_suffix;
        $obj->financial_year = $request->financial_year;
        $obj->financial_year_hint = $request->financial_year_hint;
        $obj->financial_year_interfix = $request->financial_year_interfix;
        $obj->financial_year_suffix = $request->financial_year_suffix;
        $obj->business_order_id_digit = $request->business_order_id_digit;

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

    public function updateInvoiceSample($data)
    {

        foreach ($data as $key => $invoicer_format) {
            $number = '';
            if ($invoicer_format['state_code'] == 1) {
                $number .= "BR"
                    . $invoicer_format['state_code_suffix'];
            }
            if ($invoicer_format['financial_year'] == 1) {
                $number .= "25" . $invoicer_format['financial_year_interfix'] . "26"
                    . $invoicer_format['financial_year_suffix'];
            }
            if ($invoicer_format['financial_year'] == 2) {
                $number .= "2025" . $invoicer_format['financial_year_interfix'] . "26"
                    . $invoicer_format['financial_year_suffix'];
            }
            if ($invoicer_format['financial_year'] == 3) {
                $number .= "2025" . $invoicer_format['financial_year_interfix'] . "2026"
                    . $invoicer_format['financial_year_suffix'];
            }
            $sample1 = $number . str_pad(1, $invoicer_format['business_order_id_digit'], '0', STR_PAD_LEFT);
            $sample2 = $number . str_pad(2, $invoicer_format['business_order_id_digit'], '0', STR_PAD_LEFT);
            $sample3 = $number . str_pad(3, $invoicer_format['business_order_id_digit'], '0', STR_PAD_LEFT);
            $invoicer_format->update([
                'sample1' => $sample1,
                'sample2' => $sample2,
                'sample3' => $sample3,
                'name' => "Sample " . $key+1
            ]);
        }
        return $data;
    }
}

