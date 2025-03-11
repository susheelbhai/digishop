<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Susheelbhai\Larapay\Models\Payment;
use Susheelbhai\Larapay\Models\PaymentTemp;

// This controller is developed to publish in main controller
class LarapayController extends Controller
{
    public function preOrderMethod( $request, $gateway)
    {
        $input = $request->all();
        $request_from = request()->headers->get('referer');
        $request['gst_percentage'] = 18;
        $request['gst'] = 0.01 * $request['gst_percentage'];
        $request['business_id'] = Auth::guard('business_owner')->user()->business_id;
        $request['name'] = Auth::guard('business_owner')->user()->name;
        $request['phone'] = Auth::guard('business_owner')->user()->phone;
        $request['email'] = Auth::guard('business_owner')->user()->email;
    }
    public function postOrderMethod( $request, $order_id, $gateway)
    {
        $input = $request->all();
        // dd($input);
        PaymentTemp::updateOrCreate(
            ['order_id' => $order_id],
            [
                'payment_gateway_id' => $gateway,
                'amount' => $input['amount'],
                'gst_percentage' => $input['gst_percentage'],
                'business_id' => $input['business_id'],
            ]
        );
    }
    public function paymentSuccessful($request, $data, $payment_temp)
    {
        // dd($payment_temp);
        DB::beginTransaction();
        try {
            $payment = Payment::updateOrCreate(
                [
                    'payment_id' => $data['payment_data']['payment_id'],
                    'business_id' => $payment_temp['business_id'],
                ],
                [
                    'order_id' => $data['payment_data']['order_id'],
                    'amount' => $payment_temp['amount'],
                    'gst_percentage' => $payment_temp['gst_percentage'],
                    'payment_gateway_id' => $payment_temp['payment_gateway_id'],
                    'payment_status'=>1,
                ]
            );
            Transaction::updateOrCreate(
                [
                    'payment_id' => $data['payment_data']['payment_id'],
                    'payment_id' => $payment['id']
                ],
                [
                    'transaction_type_id' => 5,
                    'business_id' => $payment_temp['business_id'],
                    'amount' => $payment_temp['amount']/(1+0.01*$payment_temp['gst_percentage']),
                ]
            );
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
        return true;
    }
    public function paymentFailed($request)
    {
        PaymentTemp::updateOrCreate(
            ['order_id' => $request['order_id']],
            [
                'payment_status' => 0,
            ]
        );
        return true;
    }
}
