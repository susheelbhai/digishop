<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;

class BankRepository
{
    function CheckIFSC($ifsc) {
        
        try {
            $result = Http::get('https://ifsc.razorpay.com/' . $ifsc);
            $bank_name= $result->json()['BANK'];
        } catch (\Throwable $th) {
            $bank_name = 'invalid';
            // throw $th;
        }
        return $bank_name;
    }
}
