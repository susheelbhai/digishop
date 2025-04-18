<?php

namespace App\Http\Requests;

use App\Rules\ValidateIFSC;
use Illuminate\Foundation\Http\FormRequest;

class BusinessOnboardApplicationRequest extends FormRequest
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
            'gst_number'=>'required',
            'gst_certificate'=>'required',
            'owner_name'=>'required',
            'owner_phone'=>'required',
            'bank_ifsc' => [new ValidateIFSC()]
        ];
    }
}
