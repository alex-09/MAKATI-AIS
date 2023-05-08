<?php

namespace App\Http\Requests\PayeeEnrollment;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'type_of_payee_id' => 'required',
            'business_name' => 'required',
            'building_no' => 'required',
            'lot_no' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality_city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'tax_id_no' => 'required',
            'dti_no' => 'required',
            'section_no' => 'required',
            'cda_no' => 'required',
            'authorized_rep' => 'required',
            'contact_no' => 'required',
            'email' => 'required',
            'date_registered' => 'required',
            'status' => 'required'
        ];
    }
}
