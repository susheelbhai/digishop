<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = array('total_price', 'taxable_amount', 'gst_amount', 'total_taxable_amount', 'total_gst_amount');
    
    public function getTotalPriceAttribute()
    {
        return $this->quantity*$this->sale_price;
    }
    
    public function getTaxableAmountAttribute()
    {
        return 100*$this->sale_price/(100+$this->gst_percentage);
    }

    public function getGstAmountAttribute()
    {
        return $this->sale_price - $this->taxable_amount;
    }

    public function getTotalGstAmountAttribute()
    {
        return $this->gst_amount*$this->quantity;
    }
    
    public function getTotalTaxableAmountAttribute()
    {
        return $this->taxable_amount*$this->quantity;
    }
}
