<?php


namespace App\Services;

use PDF;
use App\Models\Order;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Susheelbhai\Larapay\Models\Payment;

class PdfService
{

  public function taxInvoice($id, $copy)
  {
    $invoice_detail = Order::where('id', $id)
      ->with('products', 'businessState', 'customerState', 'invoiceFormat')
      ->withSum('products', 'sale_price')
      ->firstOrFail();

    // Generate PDF
    // dd($invoice_detail);
    if ($invoice_detail['tax_type_id'] == 1) {
      $view = 'pdf.invoice.' . $invoice_detail['invoiceFormat']['slug'];
    } elseif ($invoice_detail['tax_type_id'] == 2) {
      $view = 'pdf.gst_invoice.' . $invoice_detail['invoiceFormat']['slug'];
    } else {
      return abort(404);
    }
    $payment_invoice = PDF::loadView(
      $view,
      ['data' => $invoice_detail, 'copy' => $copy]
    );

    $payment_invoice->setOptions([
      'defaultFont' => 'sans-serif',
      'isRemoteEnabled' => true
    ]);

    $this->applyWatermark($payment_invoice);
    // Get binary
    $pdfBinary = $payment_invoice->output();
    
    // File name for this invoice
    $fileName = $invoice_detail['business_order_id'] . '_' . $copy . '.pdf';
    
    // dd($fileName);
    // ✅ Check if media already exists
    $existing = $invoice_detail->getMedia('invoice')
      ->where('file_name', $fileName)
      ->first();

    if ($existing) {
      // Overwrite the stored file with new content
      Storage::put($existing->getPathRelativeToRoot(), $pdfBinary);
    } else {
      // Create new media record
      $invoice_detail
        ->addMediaFromString($pdfBinary)
        ->usingFileName($fileName)
        ->usingName('Invoice ' . $invoice_detail['invoice_number'] . ' (' . ucfirst($copy) . ')')
        ->toMediaCollection('invoice');
    }

    // Stream the PDF back to the browser
    return $payment_invoice->stream($fileName);
  }



  public function paymentInvoice($payment_id, $copy)
  {
    $invoice_detail = Payment::where('id', $payment_id)->firstOrFail();
    $business_id = Auth::guard('business_owner')->user()->business_id;
    $data = Payment::where('id', $payment_id)->where('business_id', $business_id)->firstOrFail();
    $business_data = Business::where('id', $business_id)->firstOrFail();
    // return $business_data;
    $payment_invoice = PDF::loadView('pdf.invoice.payment_invoice', ['data' => $invoice_detail, 'business_data' => $business_data, 'copy' => $copy]);
    $payment_invoice->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
    $this->applyWatermark($payment_invoice);
    $path = 'business/invoice/' . Auth::guard('business_owner')->user()->business_id;
    $invoice_name = $payment_id . '_' . $copy . '.pdf';
    $invoice_full_path = $path . '/' . $invoice_name;
    // return $payment_invoice->stream($invoice_name);
    if (!file_exists($path)) {
      mkdir($path, 0777, true);
    }
    $invoice_save = $payment_invoice->save(public_path($invoice_full_path));
    if ($invoice_save) {
      Order::where('id', $payment_id)->update(['invoice_' . $copy . '_name' => $invoice_name]);
    }
    return $payment_invoice->stream($invoice_name);
  }

  private function applyWatermark($data)
  {
    if (config('app.env') != 'production') {
      $data->output();
      $id_front_wm = $data->getDomPDF()->getCanvas();
      $height = $id_front_wm->get_height();
      $width = $id_front_wm->get_width();
      $id_front_wm->set_opacity(.2, "Multiply");
      $id_front_wm->set_opacity(.2);
      $id_front_wm->page_text($width / 5, $height / 2, 'Test PDF', null, 55, array(0, 0, 0), 2, 2, -30);
    }
  }

  public function getImageBase64(string $url): ?string
  {
    try {
      $contents = file_get_contents($url);
      $mime = mime_content_type($url);
      return 'data:' . $mime . ';base64,' . base64_encode($contents);
    } catch (\Exception $e) {
      return null;
    }
  }
}
