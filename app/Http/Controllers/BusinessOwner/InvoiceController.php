<?php

namespace App\Http\Controllers\BusinessOwner;

use Illuminate\Http\Request;
use App\Models\InvoiceFormat;
use App\Models\InvoiceSetting;
use App\Models\InvoiceNumberFormat;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Services\Facades\GeneratePDF;

class InvoiceController extends Controller
{
    public function generate(string $id, string $copy = 'original')
    {
        Order::whereId($id)
        ->whereBusinessId(Auth::user()->business_id)
        ->firstOrFail();
        return GeneratePDF::taxInvoice($id, $copy);
    }
    public function show(string $id, string $invoice_key = 'original')
    {
        Order::whereId($id)->whereInvoiceKey($invoice_key)->firstOrFail();
        return GeneratePDF::taxInvoice($id, 'original');
    }
    public function setting()
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id',$business_id)->first();
        if(!isset($data)){
            InvoiceSetting::create(['business_id' => $business_id]);
        }
        $data = InvoiceSetting::where('business_id',$business_id)->first();
        return view('user.resources.invoice.show', compact('data'));
    }
    public function update_setting(Request $request)
    {
        $pan =0;
        $gstin =0;
        $bank_detail =0;
        $payment_terms =0;
        $authorised_sign =0;
        $authorised_stamp =0;
        $amount_in_words =0;
        if (isset($request->gstin)) {
            $gstin = 1;
        }
        if (isset($request->pan)) {
            $pan = 1;
        }
        if (isset($request->bank_detail)) {
            $bank_detail = 1;
        }
        if (isset($request->payment_terms)) {
            $payment_terms = 1;
        }
        if (isset($request->authorised_sign)) {
            $authorised_sign = 1;
        }
        if (isset($request->authorised_stamp)) {
            $authorised_stamp = 1;
        }
        if (isset($request->amount_in_words)) {
            $amount_in_words = 1;
        }
        $business_id = Auth::guard('business_owner')->user()->business_id;
        InvoiceSetting::updateOrCreate(
            ['business_id' => $business_id],
            [
                'pan' =>$pan,
                'gstin' =>$gstin,
                'bank_detail' =>$bank_detail,
                'payment_terms' =>$payment_terms,
                'authorised_sign' =>$authorised_sign,
                'authorised_stamp' =>$authorised_stamp,
                'amount_in_words' =>$amount_in_words,
            ]
        );
        return back();
    }

    public function invoice_format() {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::firstOrNew([
            'business_id' =>$business_id
        ]);
        $all_formats = InvoiceFormat::all();
        return view('user.resources.invoice.formats', compact('data', 'all_formats'));
    }

    public function invoiceFormatSetDefault($id) {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id', $business_id)->first();
        $data->update(['invoice_format_id'=> $id]);
        return back();
    }

    public function invoiceNumberFormatSetDefault($id) {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id', $business_id)->first();
        $data->update(['invoice_number_format_id'=> $id]);
        return back();
    }

    public function invoice_number_format() {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id', $business_id)->first();
        $all_formats = InvoiceNumberFormat::all();
        return view('user.resources.invoice.invoice_numbers', compact('data', 'all_formats'));
    }

    public function create_payment_invoice($id) {        
        return GeneratePDF::paymentInvoice($id, 'original');
    }
}
