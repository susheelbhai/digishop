<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessEmployee extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessEmployeeFactory> */
    use HasFactory;
    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class);
    }

    
    public function state(){
        return $this->belongsTo(State::class);
    }
}
