<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingProduct extends Model
{
    use HasFactory;

    protected $table = 'settings_product';
    protected $guarded = [];
}
