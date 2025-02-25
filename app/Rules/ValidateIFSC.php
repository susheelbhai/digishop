<?php

namespace App\Rules;

use Closure;
use App\Repository\BankRepository;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateIFSC implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $ifsc_repo = new BankRepository();
        $bankName = $ifsc_repo->CheckIFSC($value);
        if ($value != '' && $bankName == 'invalid') {
            $fail("Please inter valid IFSC");
        }
    }
}
