<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class PreAuditRequest extends FormRequest
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
            'payee_name' => 'required',
            'particulars'=> 'required',
            'amount'=> 'required',
            'current_bearer'=> 'required',
            'current_bearer_dept'=> 'required',
            'current_bearer_contact_number'=> 'required',
            'current_bearer_email'=> 'required',
        ];
    }
}
