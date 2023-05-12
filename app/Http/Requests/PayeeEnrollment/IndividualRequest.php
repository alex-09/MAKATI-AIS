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
            'type_of_payee_id' => 'required',
            'client_type' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'suffix' => 'required',
            'building_no' => 'required',
            'lot_no' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality_city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'date_registered' => 'required',
            'status' => 'required'
        ];
    }
}
