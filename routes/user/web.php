<?php

use App\Http\Middleware\HasBalance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ReportController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\BusinessController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\EmployeeController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\WarehouseController;

Route::get('/', function () {
    return view('separate.user.pages.home.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/qr_scanner', [HomeController::class, 'qr_scanner'])->name('qr_scanner');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/business', BusinessController::class);
    Route::resource('/warehouse', WarehouseController::class);
    Route::get('/warehouse/addRacks/{id}', [WarehouseController::class, 'addRacks'])->name('warehouse.addRacks');
    Route::post('/warehouse/addRacks/{id}', [WarehouseController::class, 'storeRacks'])->name('warehouse.racks.store');
    Route::get('/rack/{id}', [WarehouseController::class, 'showRacks'])->name('warehouse.racks.show');
    Route::resource('/customer', CustomerController::class)->except(['delete']);
    Route::resource('/employee', EmployeeController::class)->except(['delete']);
    Route::resource('/product', ProductController::class)->except(['delete']);
    Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory.index');
    Route::get('/product/barcode/{id}', [ProductController::class, 'showBarCode'])->name('product.showBarCode');
    Route::resource('/transaction', TransactionController::class)->except(['delete']);
    Route::resource('/order', OrderController::class)->except(['delete'])->middleware(HasBalance::class, ['only' => ['create']]);
    Route::get('/invoice/generate/{id}/{copy}', [InvoiceController::class, 'generate'])->name('invoice.generate');
    Route::get('/product_setting', [SettingController::class, 'productSetting'])->name('product.setting');
    Route::patch('/product_setting', [SettingController::class, 'productSettingUpdate'])->name('product.setting.update');
    Route::get('/invoice_setting', [InvoiceController::class, 'setting'])->name('invoice.setting');
    Route::get('/invoice_format', [InvoiceController::class, 'invoice_format'])->name('invoice.format');
    Route::get('/invoiceFormat/setDefault/{id}', [InvoiceController::class, 'invoiceFormatSetDefault'])->name('invoice.format.setDefault');
    Route::get('/invoiceNumberFormat/setDefault/{id}', [InvoiceController::class, 'invoiceNumberFormatSetDefault'])->name('invoice_number.format.setDefault');
    Route::get('/invoice_number_format', [InvoiceController::class, 'invoice_number_format'])->name('invoice.invoice_number_format');
    Route::patch('/update_invoice_setting', [InvoiceController::class, 'update_setting'])->name('invoice.setting.update');
    Route::get('/create_payment_invoice/{id}', [InvoiceController::class, 'create_payment_invoice'])->name('create_payment_invoice');

    Route::name('report.')->prefix('report')->controller(ReportController::class)->group(function(){
        Route::get('product', 'product')->name('product');
        Route::post('product', 'productReport');
        Route::get('inventory', 'inventory')->name('inventory');
        Route::post('inventory', 'inventoryReport');
        Route::get('order', 'order')->name('order');
        Route::post('order', 'orderReport');
    });
});

require __DIR__.'/auth.php';
