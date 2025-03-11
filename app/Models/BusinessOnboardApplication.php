<?php

namespace App\Models;

use App\Models\State;
use App\Models\Partner;
use App\Models\SubscriptionType;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessOnboardApplication extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
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
