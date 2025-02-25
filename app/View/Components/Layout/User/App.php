<?php

namespace App\View\Components\Layout\User;

use App\Models\Business;
use App\Models\Setting;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class App extends Component
{
    public function __construct()
    {
        $user = Auth::guard('web')->user();
        $setting = Setting::firstOrCreate(['id'=>1]);
        $current_business = Business::find($user->business_id);
        // dd($current_business);
        $theme = 'theme1';
        $user = [
            'login' => $user,
            'theme' => $theme,
        ];
        Session::put('user',$user);
        Session::put('current_business',$current_business);
        Config::set('app.name', $setting['app_name']);
        Config::set('app.dark_logo', $setting['dark_logo']);
        Config::set('app.light_logo', $setting['light_logo']);
        Config::set('app.favicon', $setting['favicon']);
    }

    public function render(): View|Closure|string
    {
        return view('components.layout.user.app');
    }
}
