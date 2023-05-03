<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class PreAudRequest extends FormRequest
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
            'transaction_id' => 'required',
            'particulars' => 'string',
            'payee_name' => 'string',
            'amount' => 'integer',
            'current_bearer' => 'required',
            'current_bearer_dept' => 'required',
            'current_bearer_contact_number' => 'required',
            'current_bearer_email' => 'required',
        ];
    }
}
