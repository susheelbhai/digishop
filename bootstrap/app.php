<?php

use Illuminate\Foundation\Application;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);

        Authenticate::redirectUsing(function($request){
            $path = explode('/', $request->getPathInfo());
            if (in_array('admin', $path)) {
                return route('admin.login');
            }
            if (in_array('partner', $path)) {
                return route('partner.login');
            }
            if (in_array('doctor', $path)) {
                return route('doctor.login');
            }
        });
        RedirectIfAuthenticated::redirectUsing(function($request){
            $path = explode('/', $request->getPathInfo());
            if (in_array('admin', $path)) {
                return route('admin.dashboard');
            }
            if (in_array('partner', $path)) {
                return route('partner.dashboard');
            }
            if (in_array('doctor', $path)) {
                return route('doctor.dashboard');
            }
            return route('dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
