<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function manualWebhook() {
        return view('admin.resources.payment.manual_webhook');
    }
}
