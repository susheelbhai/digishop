<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessOnboardApplication extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function state(){
        return $this->belongsTo(State::class);
    }
    
    public function partner(){
        return $this->belongsTo(Partner::class);
    }
    
    public function subscriptionType(){
        return $this->belongsTo(SubscriptionType::class);
    }
}
