<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Business;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessOnboardApplication;

class BusinessController extends Controller
{
    public function index() : View
    {
        $data = Business::all();
        return view('admin.resources.business.index', compact('data'));
    }
    

    
    public function store(Request $request)
    {
        //
    }
    
    public function show(string $id)
    {
        $data = Business::findOrFail($id);
        return view('admin.resources.business.show', compact('data'));
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
