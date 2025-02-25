<?php

namespace App\View\Components\Layout\User;

use Closure;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Guest extends Component
{
    public function __construct()
    {
        $setting = Setting::firstOrCreate(['id'=>1]);
        $theme = 'theme1';
        $user = [
            'theme' => 'theme1',
        ];
        Session::put('user',$user);
        Config::set('app.name', $setting['app_name']);
        Config::set('app.dark_logo', $setting['dark_logo']);
        Config::set('app.light_logo', $setting['light_logo']);
        Config::set('app.favicon', $setting['favicon']);
    }

    
    public function render(): View|Closure|string
    {
        return view('components.layout.user.guest');
    }
}
