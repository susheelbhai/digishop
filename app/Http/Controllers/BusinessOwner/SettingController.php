<?php

namespace App\Http\Controllers\BusinessOwner;

use Illuminate\Http\Request;
use App\Models\SettingProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function productSetting() {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        // dd($business_id);
        $data = SettingProduct::where('business_id',$business_id)->first();
        if(!isset($data)){
            $data = SettingProduct::create(['business_id' => $business_id]);
        }
        return view('user.resources.setting.product', compact('data'));
    }
    public function productSettingUpdate(Request $request) {
        $request->validate([
            'default_gst_percentage' => 'required',
        ]);
       $auto_print_bar_code = isset($request->auto_print_bar_code) ? 1 : 0 ;
       $add_product_while_order = isset($request->add_product_while_order) ? 1 : 0 ;

        $business_id = Auth::guard('business_owner')->user()->business_id;
        $data = SettingProduct::where('business_id',$business_id)->first();
        $data->default_gst_percentage = $request->default_gst_percentage;
        $data->auto_print_bar_code = $auto_print_bar_code;
        $data->add_product_while_order = $add_product_while_order;
        $data->update();
        return back()->with('success', 'Product settings updated successfully');
    }
}
