<?php


namespace App\Services;

use PDF;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Business;
use App\Models\InvoiceSetting;
use Illuminate\Support\Facades\Auth;
use Susheelbhai\Larapay\Models\Payment;

class PdfService
{

  public function taxInvoice($payment_id, $copy)
  {
     $invoice_detail = Order::where('id', $payment_id)
     ->with('products', 'businessState', 'customerState', 'invoiceFormat')
     ->withSum('products', 'sale_price')
     ->firstOrFail();
    //  return $invoice_detail;
    // dd($invoice_detail);
    $payment_invoice = PDF::loadView('pdf.invoice.'.$invoice_detail['invoiceFormat']['slug'], ['data' => $invoice_detail, 'copy' => $copy]);
    $payment_invoice->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
    $this->applyWatermark($payment_invoice);
    $path = 'business/invoice/'.Auth::guard('web')->user()->business_id;
    $invoice_name = $path.'/' . $invoice_detail['invoice_number'] . '_' . $copy . '.pdf';
    if (!file_exists('storage/'.$path)) {
      mkdir('storage/'.$path, 0777, true);
    }
    $invoice_save = $payment_invoice->save(public_path($invoice_name));
    if ($invoice_save) {
      Order::where('id', $payment_id)->update(['invoice_'.$copy.'_name' => $invoice_name]);
    }
    return $payment_invoice->stream('invoice_'.$payment_id.'_'.$copy.'.pdf');
  }
  public function paymentInvoice($payment_id, $copy)
  {
     $invoice_detail = Payment::where('id', $payment_id)->firstOrFail();
     $business_id = Auth::guard('web')->user()->business_id;
        $data = Payment::where('id', $payment_id)->where('business_id', $business_id)->firstOrFail();
        $business_data = Business::where('id', $business_id)->firstOrFail();
    // return $business_data;
    $payment_invoice = PDF::loadView('pdf.invoice.payment_invoice', ['data' => $invoice_detail, 'business_data'=> $business_data,'copy' => $copy]);
    $payment_invoice->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
    $this->applyWatermark($payment_invoice);
    $path = 'business/invoice/'.Auth::guard('web')->user()->business_id;
    $invoice_name = $payment_id.'_' . $copy . '.pdf';
    $invoice_full_path = $path.'/' . $invoice_name;
    // return $payment_invoice->stream($invoice_name);
    if (!file_exists($path)) {
      mkdir($path, 0777, true);
    }
    $invoice_save = $payment_invoice->save(public_path($invoice_full_path));
    if ($invoice_save) {
      Order::where('id', $payment_id)->update(['invoice_'.$copy.'_name' => $invoice_name]);
    }
    return $payment_invoice->stream($invoice_name);
  }

  private function applyWatermark($data)
  {
    if (config('app.env') == 'local') {
      $data->output();
      $id_front_wm = $data->getDomPDF()->getCanvas();
      $height = $id_front_wm->get_height();
      $width = $id_front_wm->get_width();
      $id_front_wm->set_opacity(.2, "Multiply");
      $id_front_wm->set_opacity(.2);
      $id_front_wm->page_text($width / 5, $height / 2, 'Test PDF', null, 55, array(0, 0, 0), 2, 2, -30);
    }
  }
}
