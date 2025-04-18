<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function business(){
        return $this->belongsTo(Business::class);
    }
    public function inventory(){
        return $this->hasMany(Inventory::class);
    }
    
}
