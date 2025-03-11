<?php

namespace App\Http\Controllers\BusinessOwner\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\BusinessOwner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        return view('separate.user.auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $user = BusinessOwner::whereEmail($request['email'])
        ->orWhere('phone', $request['email'])
        ->first();
        // dd($user) ;
        $request->authenticate($user,'business_owner');
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('business_owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
