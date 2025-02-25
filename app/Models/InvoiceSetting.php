<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSetting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function invoiceNumberFormat() {
        return $this->belongsTo(InvoiceNumberFormat::class);
    }
    public function invoiceFormat() {
        return $this->belongsTo(InvoiceFormat::class);
    }
}
