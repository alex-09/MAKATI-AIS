<?php

namespace App\Http\Requests\PayeeEnrollment;

use Illuminate\Foundation\Http\FormRequest;

class GovAgencyRequest extends FormRequest
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
            'agency_name' => 'string',
            'building_no' => 'string',
            'lot_no' => 'string',
            'street' => 'string',
            'barangay' => 'string',
            'municipality_city' => 'string',
            'province' => 'string',
            'country' => 'string',
            'zip_code' => 'string',
            'tax_id_no' => 'string',
            'authorized_rep' => 'string',
            'contact_no' => 'string',
            'email' => 'string',
            'status' => 'string'
        ];
    }
}
