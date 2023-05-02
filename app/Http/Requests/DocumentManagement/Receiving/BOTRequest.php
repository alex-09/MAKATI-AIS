<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class BOTRequest extends FormRequest
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
            'docu_type_id' => 'required',
            'department_id' => 'required',
            'processing_slip_number' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'current_bearer' => 'required',
            'current_bearer_dept' => 'required',
            'current_bearer_contact_number' => 'required',
            'current_bearer_email' => 'required',
        ];
    }
}
