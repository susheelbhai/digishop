<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    /** @use HasFactory<\Database\Factories\TaxTypeFactory> */
    use HasFactory;
    public $timestamps = false;
    public $append = ['name'];
    public function getNameAttribute()
    {
        return $this->attributes['title'];
    }
}
