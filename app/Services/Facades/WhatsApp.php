<?php

namespace App\Services\Facades;

// use App\Services\SmsService;
use Illuminate\Support\Facades\Facade;

class WhatsApp extends Facade{

    protected static function getFacadeAccessor()
    {
        
        return 'whatsappProvider';
    }

}