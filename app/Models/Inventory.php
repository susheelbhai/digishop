<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function warehouseRack(){
        return $this->belongsTo(WarehouseRack::class);
    }
    
    
}
