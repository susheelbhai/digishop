<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Partner\ProfileController;
use App\Http\Controllers\Partner\BusinessController;
use App\Http\Controllers\Partner\BusinessApplicationController;


Route::get('/partner', function () {
    return view('separate.partner.dashboard');
})->middleware(['auth:partner', 'verified'])->name('partner.dashboard');

Route::prefix('partner')->name('partner.')->middleware('auth:partner')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/business', BusinessController::class)->except(['create', 'edit', 'update', 'store', 'delete']);
    Route::resource('/business_application', BusinessApplicationController::class)->except(['delete']);
});

require __DIR__ . '/auth.php';
