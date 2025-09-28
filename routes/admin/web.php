<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Slider1Controller;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\UserQueryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ImportantLinkController;
use App\Http\Controllers\Admin\InvoiceFormatController;
use App\Http\Controllers\Admin\InvoiceNumberController;
use App\Http\Controllers\Admin\BusinessApplicationController;

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/manualWebhook', [PaymentController::class, 'manualWebhook'])->name('manualWebhook');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::name('settings.')->controller(SettingController::class)->prefix('setting')->group(function () {
        Route::get('/general', 'generalSettings')->name('general');
        Route::get('/advanced', 'advanceSettings')->name('advanced');
        Route::patch('/general', 'generalSettingsUpdate');
        Route::patch('/advanced', 'advanceSettingsUpdate');
    });

    Route::name('pages.')->controller(PagesController::class)->prefix('pages')->group(function () {
        Route::get('/homePage', 'homePage')->name('homePage');
        Route::patch('/homePage', 'updateHomePage')->name('updateHomePage');
        Route::get('/aboutPage', 'aboutPage')->name('aboutPage');
        Route::patch('/aboutPage', 'updateAboutPage')->name('updateAboutPage');
        Route::get('/contactPage', 'contactPage')->name('contactPage');
        Route::patch('/contactPage', 'updateContactPage')->name('updateContactPage');
        Route::get('/tncPage', 'tncPage')->name('tncPage');
        Route::patch('/tncPage', 'updateTncPage')->name('updateTncPage');
        Route::get('/privacyPage', 'privacyPage')->name('privacyPage');
        Route::patch('/privacyPage', 'updatePrivacyPage')->name('updatePrivacyPage');
    });
    Route::resource('/slider1', Slider1Controller::class)->except(['show', 'destroy']);
    Route::resource('/slider', SliderController::class);
    Route::resource('/partner', PartnerController::class);
    Route::resource('/userQuery', UserQueryController::class);
    Route::resource('/important_links', ImportantLinkController::class);
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('user', UserController::class);
    Route::resource('/business', BusinessController::class)->except(['create', 'store', 'delete']);
    Route::resource('/business_application', BusinessApplicationController::class);
    Route::post('/approve_business_application/{id}', [BusinessApplicationController::class, 'approve'])->name('business_application.approve');
    Route::post('/reject_business_application/{id}', [BusinessApplicationController::class, 'reject'])->name('business_application.reject');
    Route::resource('invoiceFormat', InvoiceFormatController::class);
    Route::resource('invoiceNumber', InvoiceNumberController::class);
});

require __DIR__ . '/auth.php';