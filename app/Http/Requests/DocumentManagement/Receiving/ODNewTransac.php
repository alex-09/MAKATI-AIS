<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class ODNewTransac extends FormRequest
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

            'particulars' => 'required',
            'date' => 'required',
            'fund_source' => 'required',
            'bearer_name' => 'required',
            'department_office' => 'required',
            'contact_no' => 'required',
            'email' => 'required'

        ];
    }
}
