<?php

namespace App\Http\Requests\PayeeEnrollment;

use Illuminate\Foundation\Http\FormRequest;

class IndividualRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'suffix' => 'string',
            'building_no' => 'string',
            'lot_no' => 'string',
            'street' => 'string',
            'barangay' => 'string',
            'municipality_city' => 'string',
            'province' => 'string',
            'country' => 'string',
            'zip_code' => 'string',
            'tax' => 'string',
            'dti' => 'string',
            'authorized' => 'string',
            'status' => 'string',
            'contact' => 'string',
            'email' => 'string',
            'receiver' => 'string'
        ];
    }
}
