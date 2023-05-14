<?php

namespace App\Http\Requests\DocumentManagement\Incoming;

use Illuminate\Foundation\Http\FormRequest;

class CPOCityAccountAction extends FormRequest
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
        'transaction_no' => 'required',
        'payee_name' => 'required',
        'contact_no' => 'required',	
        'contract_date' => 'required',	
        'contract_amount' => 'required',	
        'particulars' => 'required'
        ];
    }
}
