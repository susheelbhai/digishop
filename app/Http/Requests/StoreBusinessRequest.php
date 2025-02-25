<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            "registration_number"=> "required",
            "gst_number"=> "required",
            "email"=> "required",
            "phone"=> "required",
            "address"=> "required",
            "city"=> "required",
            "pin"=> "required",
            "state_id"=> "required",
            "subscription_type_id"=> "required",
            "bank_account_number"=> "required",
            "bank_account_holder_name"=> "required",
            "bank_ifsc"=> "required",
            "bank_swift"=> "required",
            "iec_code"=> "required",
            "ad_code"=> "required",
            "arn_code"=> "required",
            "payment_terms"=> "required",
            "gst_certificate"=> "required"
        ];
    }
}
