<?php

namespace App\Action\Order;

use Carbon\Carbon;
use App\Models\Order;
use App\Helpers\Helper;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Transaction;
use App\Events\OrderCreated;
use App\Models\OrderProduct;
use App\Models\InvoiceSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class CreateOrderAction
{
    public $business_id;
    public function __construct($business_id)
    {
        $this->business_id = $business_id;
    }

    public function createOrder($customer_detail, $business_detail, $added_products)
    {
        $invoice_setting = InvoiceSetting::where('business_id', $this->business_id)
            ->with('invoiceNumberFormat')->first();
        $invoice_number_format = $invoice_setting['invoiceNumberFormat']['slug'];
        $business_order_id = $this->calculateBusinessOrderId();
        $customer = $this->updateCustomer($customer_detail);

        DB::beginTransaction();
        try {
            $order = Order::create(
                [
                    'business_id' => $this->business_id,
                    'business_order_id' => $business_order_id,
                    'invoice_format_id' => $invoice_setting['invoice_format_id'],
                    'invoice_date' => Carbon::now(),
                    'customer_id' => $customer['id'],
                    'customer_gstin' => $customer_detail['gstin'],
                    'customer_name' => $customer_detail['name'],
                    'customer_email' => $customer_detail['email'],
                    'customer_phone' => $customer_detail['phone'],
                    'customer_address' => $customer_detail['address'],
                    'customer_city' => $customer_detail['city'],
                    'customer_pin' => $customer_detail['pin'],
                    'customer_state_id' => $customer_detail['state_id'],
                    'business_cin' => $business_detail['registration_number'],
                    'business_gstin' => $business_detail['gst_number'],
                    'business_name' => $business_detail['name'],
                    'business_email' => $business_detail['email'],
                    'business_phone' => $business_detail['phone'],
                    'business_address' => $business_detail['address'],
                    'business_city' => $business_detail['city'],
                    'business_pin' => $business_detail['pin'],
                    'business_state_id' => $business_detail['state_id'],
                    'bank_name' => $business_detail['bank_name'],
                    'bank_account_number' => $business_detail['bank_account_number'],
                    'bank_account_holder_name' => $business_detail['bank_account_holder_name'],
                    'bank_ifsc' => $business_detail['bank_ifsc'],
                    'bank_swift' => $business_detail['bank_swift'],
                    'authorised_stamp' => $business_detail['authorised_stamp'],
                    'authorised_sign' => $business_detail['authorised_sign'],
                ]
            );
            // dd($added_products);
            foreach ($added_products as $key => $value) {
                OrderProduct::create(
                    [
                        'order_id' => $order->id,
                        'name' => $value['name'],
                        'hsn_code' => $value['hsn_code'],
                        'description' => $value['description'],
                        'sale_price' => $value['sale_price'],
                        'quantity' => $value['quantity'],
                        'gst_percentage' => $value['gst_percentage'],
                    ]
                );
                Inventory::create(
                    [
                        'business_id' => $this->business_id,
                        'product_id' => $value['id'],
                        'warehouse_rack_id' => $value['warehouse_rack_id'],
                        'order_id' => $order->id,
                        'quantity' => -1 * $value['quantity'],
                        'sale_price' => $value['sale_price'],
                    ]
                );
            }
            // dd(Helper::invoiceNumber($order, 'format3'));
            Order::find($order->id)->update([
                'invoice_number' => Helper::invoiceNumber($order, $invoice_number_format)
            ]);
            $ip_address = Request::ip();
            Transaction::updateOrCreate(
                ['order_id' => $order->id],
                [
                    'transaction_type_id' => 1,
                    'business_id' => $this->business_id,
                    'amount' => -1,
                    'ip_address' => $ip_address,
                ]
            );
            // dd($ip_address);
            event(new OrderCreated($order->id));
            DB::commit();
            return $order;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateCustomer($customer_detail)
    {
        $customer = Customer::updateOrCreate(
            [
                'phone' => $customer_detail['phone'],
                'business_id' => $this->business_id
            ],
            [
                'gstin' => $customer_detail['gstin'],
                'name' => $customer_detail['name'],
                'email' => $customer_detail['email'],
                'phone' => $customer_detail['phone'],
                'address' => $customer_detail['address'],
                'city' => $customer_detail['city'],
                'pin' => $customer_detail['pin'],
                'state_id' => $customer_detail['state_id'],
            ]
        );
        return $customer;
    }
    

    public function calculateBusinessOrderId()
    {
        if (date("m") >= 4) {
            $y = date('Y');
            $pt = date('Y', strtotime('+1 year'));
        } else {
            $y = date('Y', strtotime('-1 year'));
            $pt = date('Y');
        }
        $start_date = $y . "-04-01";
        $end_date = $pt . "-04-01";
        $data = Order::where('business_id', $this->business_id)
            ->where('invoice_date', '>=', $start_date)
            ->where('invoice_date', '<', $end_date)
            ->latest()
            ->get();
        if (count($data) == 0) {
            $business_detail = Business::find($this->business_id);
            $start_id = $business_detail['invoice_start_id'];
        } else {
            $start_id = count($data) + 1;
        }
        return $start_id;
    }
    
}
