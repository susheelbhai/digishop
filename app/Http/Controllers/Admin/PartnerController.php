<?php

namespace App\Http\Controllers\Admin;

use App\Events\PartnerCreated;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Theme;
use App\Models\UserGender;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Partner::all();
        // return $data;
        return view('separate.admin.resources.partner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        $genders = UserGender::all();
        return view('separate.admin.resources.partner.create', compact('themes', 'genders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->profile_pic==''){
            $image_name='images/profile_pic/partner/dummy.png';
          }
          else{
            $image_name='images/profile_pic/partner/'.uniqid().'.'.$request->file('profile_pic')->getClientOriginalExtension();
            $request->profile_pic->move(public_path('/storage/images/profile_pic/partner'),$image_name);
          }
          $user_password = Str::lower(Str::random(12));
          DB::beginTransaction();
          try {
            $data = Partner::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'designation' => $request->designation,
                'theme_id' => $request->theme_id,
                'gender_id' => $request->gender_id,
                'color1' => $request->color1,
                'color2' => $request->color2,
                'color3' => $request->color3,
                'profile_pic' => $image_name,
                'password' => Hash::make($user_password),
              ]);
  
              PartnerCreated::dispatch($data,$user_password);
              DB::commit();
          } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
          }
          
        return Redirect::route('admin.partner.index')->with('status', 'partner-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Partner::findOrFail($id);
        return view('separate.admin.resources.partner.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $themes = Theme::all();
        $genders = UserGender::all();
        $user = Partner::find($id);
        return view('separate.admin.resources.partner.edit', compact('user', 'themes', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Partner::find($id);

        if($request->profile_pic==''){
            $image_name=$data->profile_pic;
          }
          else{
            $image_name='images/profile_pic/partner/'.uniqid().'.'.$request->file('profile_pic')->getClientOriginalExtension();
            $request->profile_pic->move(public_path('/storage/images/profile_pic/partner'),$image_name);
            File::delete(public_path('storage/images/profile_pic/partner/'.$data->profile_pic));
          }
          Partner::where('id', $data->id)->
          update([
              'name' => $request->name,
              'phone' => $request->phone,
              'email' => $request->email,
              'designation' => $request->designation,
                'theme_id' => $request->theme_id,
                'gender_id' => $request->gender_id,
                'color1' => $request->color1,
                'color2' => $request->color2,
                'color3' => $request->color3,
                'profile_pic' => $image_name,
              'profile_pic' => $image_name,
            ]);
            

        return Redirect::route('admin.partner.update', $id)->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
