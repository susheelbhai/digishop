<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseRack extends Model
{
    /** @use HasFactory<\Database\Factories\WarehouseRackFactory> */
    use HasFactory;
    protected $guarded =[];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    
    public function products(){
        return $this->hasMany(Inventory::class);
    }
}
