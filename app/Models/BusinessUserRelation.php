<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUserRelation extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessUserRelationFactory> */
    use HasFactory;
    protected $guarded = [];

    public function business() {
        return $this->belongsTo(Business::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
