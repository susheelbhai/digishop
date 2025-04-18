<?php

namespace App\Rules;

use App\Helpers\Helper;
use App\Models\Customer;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class UniquePhoneForBusiness implements ValidationRule
{
    public $id;
    public function __construct($id = '') {
        $this->id = $id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $business_id = Auth::guard('business_owner')->user()->business_id;
        $find_phone = Customer::where('business_id', $business_id)->where('phone', Helper::cleanPhone($value))->count();
        if ($this->id != '') {
            $find_phone = Customer::where('business_id', $business_id)->where('id', '!=', $this->id)->where('phone', Helper::cleanPhone($value))->count();
        }
        if ($find_phone > 0) {
            $fail("This phone number is already registered");
        }
    }
}
