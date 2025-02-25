<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    /** @use HasFactory<\Database\Factories\WarehouseFactory> */
    use HasFactory;
    protected $guarded =[];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function racks(){
        return $this->hasMany(WarehouseRack::class);
    }
}
