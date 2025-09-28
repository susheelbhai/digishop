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
    public function setting($tax_type_id)
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id',$business_id)
        ->where('tax_type_id',$tax_type_id)
        ->first();
        if(!isset($data)){
            InvoiceSetting::create(['business_id' => $business_id, 'tax_type_id' => $tax_type_id]);
        }
        $data = InvoiceSetting::where('business_id',$business_id)->where('tax_type_id',$tax_type_id)->first();
        return view('user.resources.invoice.show', compact('data', 'tax_type_id'));
    }
    public function update_setting(Request $request, $tax_type_id)
    {
        $pan =0;
        $gstin =0;
        $bank_detail =0;
        $payment_terms =0;
        $authorised_sign =0;
        $authorised_stamp =0;
        $amount_in_words =0;
        // return $request->all();
        if (isset($request->gstin) && $request->gstin != 0) {
            $gstin = 1;
        }
        if (isset($request->pan) && $request->pan != 0) {
            $pan = 1;
        }
        if (isset($request->bank_detail) && $request->bank_detail != 0) {
            $bank_detail = 1;
        }
        if (isset($request->payment_terms) && $request->payment_terms != 0) {
            $payment_terms = 1;
        }
        if (isset($request->authorised_sign) && $request->authorised_sign != 0) {
            $authorised_sign = 1;
        }
        if (isset($request->authorised_stamp) && $request->authorised_stamp != 0) {
            $authorised_stamp = 1;
        }
        if (isset($request->amount_in_words) && $request->amount_in_words != 0) {
            $amount_in_words = 1;
        }
        $business_id = Auth::guard('business_owner')->user()->business_id;
        InvoiceSetting::updateOrCreate(
            [
                'business_id' => $business_id,
                'tax_type_id' => $tax_type_id,
            ],
            [
                'pan' =>$pan,
                'gstin' =>$gstin,
                'bank_detail' =>$bank_detail,
                'payment_terms' =>$payment_terms,
                'authorised_sign' =>$authorised_sign,
                'authorised_stamp' =>$authorised_stamp,
                'amount_in_words' =>$amount_in_words,
                'invoice_number_prefix' => $request->invoice_number_prefix,
                'invoice_number_suffix' => $request->invoice_number_suffix,
            ]
        );
        return back();
    }

    public function invoice_format($tax_type_id) {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::firstOrNew([
            'business_id' =>$business_id
        ]);
       $all_formats = InvoiceFormat::where('tax_type_id', $tax_type_id)->get();
        return view('user.resources.invoice.formats', compact('data', 'all_formats', 'tax_type_id'));
    }

    public function invoiceFormatSetDefault($id) {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id', $business_id)->first();
        $data->update(['invoice_format_id'=> $id]);
        return back();
    }


    public function invoice_number_format($tax_type_id) {

        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id', $business_id)
        ->where('tax_type_id', $tax_type_id)
       ->first();
        $all_formats = InvoiceNumberFormat::all();
        return view('user.resources.invoice.invoice_numbers', compact('data', 'all_formats', 'tax_type_id'));
    }

    public function invoiceNumberFormatSetDefault($id, $tax_type_id) {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = InvoiceSetting::where('business_id', $business_id)
            ->where('tax_type_id', $tax_type_id)
            ->first();
        $data->update(['invoice_number_format_id'=> $id]);
        return back();
    }

    public function create_payment_invoice($id) {        
        return GeneratePDF::paymentInvoice($id, 'original');
    }
}
