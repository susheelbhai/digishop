<?php

namespace App\Http\Controllers\Partner;

use App\Models\Business;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    
    public function index() : View
    {
        $data = Business::where('partner_id', Auth::guard('partner')->id())->get();
        return view('partner.resources.business.index', compact('data'));
    }
    
    public function show(string $id)
    {
        $data = Business::findOrFail($id);
        if ($data['partner_id'] != Auth::guard('partner')->user()->id) {
            abort('403');
        }
        return view('partner.resources.business.show', compact('data'));
    }

}
