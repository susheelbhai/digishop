<?php

namespace App\Http\Controllers\BusinessOwner;

use App\Models\Order;
use App\Models\Product;
use App\Models\Inventory;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Exports\InventoryExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public $business_id;
    public function __construct() {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $this->business_id = $business_id;
    }

    public function product() {
        return view('user.resources.reports.product');
    }

    public function productReport(Request $request) {        
        $data = Product::where('business_id', $this->business_id)
        ->where(function($query) use($request) {
            $this->dateFilter($query, $request);
        })
        ->withSum('inventory', 'quantity')
        ->get();
        
        return Excel::download(new ProductExport($data), 'products.xlsx');
    }

    public function inventory() {
        return view('user.resources.reports.inventory');
    }

    public function inventoryReport(Request $request) {
        $data = Inventory::where('business_id', $this->business_id)
        ->where(function($query) use($request) {
            $this->dateFilter($query, $request);
        })
        ->with('product')
        ->get();
        
        return Excel::download(new InventoryExport($data), 'products.xlsx');
    }

    public function order() {
        return view('user.resources.reports.order');
    }

    public function orderReport(Request $request) {
        $data = Order::where('business_id', $this->business_id)
        ->where(function($query) use($request) {
            $this->dateFilter($query, $request);
        })
        ->with('products')
        ->get();
        // return $data;
        return Excel::download(new OrderExport($data), 'orders.xlsx');
    }

    private function dateFilter($query, $request) {
        $to_date = date_format(date_add(date_create($request['to_date']), date_interval_create_from_date_string('1 days')), 'Y-m-d');
        
        if ($request['from_date'] != null && $request['from_date'] != '') {
            $query->where('created_at', '>=', $request['from_date']);
        }
        if ($request['from_date'] != null && $request['from_date'] != '') {
            $query->where('created_at', '<=', $to_date);
        }
    }
}
