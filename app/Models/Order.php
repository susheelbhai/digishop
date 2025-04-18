<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    
    public function business(){
        return $this->belongsTo(Order::class);
    }

    public function products() {
        return $this->hasMany(OrderProduct::class);
    }

    public function businessState() {
        return $this->belongsTo(State::class);
    }

    public function customerState() {
        return $this->belongsTo(State::class);
    }

    public function invoiceSetting() {
        return $this->belongsTo(InvoiceSetting::class, 'business_id', 'business_id');
    }
    public function invoiceFormat() {
        return $this->belongsTo(InvoiceFormat::class);
    }
}
