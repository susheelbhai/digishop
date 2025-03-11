<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasBalance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
         $amount = Transaction::where('business_id', $business_id)->latest()->sum('amount');
        if ($amount < 2) {
            return redirect()->route('transaction.index');
        }
        return $next($request);
    }
}
