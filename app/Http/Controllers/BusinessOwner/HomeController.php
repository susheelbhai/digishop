<?php

namespace App\Http\Controllers\BusinessOwner;

use App\Models\Order;
use App\Models\Business;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index() {
        $monthly_chart_data = Order::leftJoin('order_products', 'order_products.order_id', '=', 'orders.id')
            ->whereBusinessId(Auth::guard('business_owner')->user()->business_id)
            ->select(
                DB::raw('sum(order_products.sale_price * order_products.quantity) as sums'),
                DB::raw("DATE_FORMAT(orders.created_at,'%M %Y') as months"),
                DB::raw("DATE_FORMAT(orders.created_at,'%m') as monthKey")
            )
            ->groupBy('months', 'monthKey')
            ->orderBy('orders.created_at', 'ASC')
            ->get();
        $daily_chart_data = Order::leftJoin('order_products', 'order_products.order_id', '=', 'orders.id')
            ->whereBusinessId(Auth::guard('business_owner')->user()->business_id)
            ->select(
                DB::raw('sum(order_products.sale_price * order_products.quantity) as sums'),
                DB::raw("DATE_FORMAT(orders.created_at,'%d %M %Y') as months"),
                DB::raw("DATE_FORMAT(orders.created_at,'%d') as monthKey")
            )
            ->groupBy('months', 'monthKey')
            ->orderBy('orders.created_at', 'ASC')
            ->get();
        return view('user.dashboard', compact('monthly_chart_data', 'daily_chart_data'));
    }
    
    function qr_scanner() : View {
        return view('user.qr_scanner');
    }

    function business_detail() {
        $data = Business::find(Auth::guard('business_owner')->user()->business_id);
        return view('user.resources.business.show', compact('data'));
    }
}
