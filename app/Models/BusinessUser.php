<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\Auth\User\ResetPasswordNotification;

class BusinessUser extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class);
    }
    public function gender(){
        return $this->belongsTo(UserGender::class);
    }
    public function theme(){
        return $this->belongsTo(Theme::class);
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
