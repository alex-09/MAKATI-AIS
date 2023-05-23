<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class CheckTransacRequest extends FormRequest
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
            'payee_name' => 'required',
            'tin_no' => 'required',
            'dv_no' => 'required',
            'particulars' => 'required',
            'amount' => 'required',
            'fund_source' => 'required',
            'cafoa_furs_no' => 'required',
            'check_no' => 'required',
            'account_no' => 'required',
            'date_of_check' => 'required',
            'check_amount' => 'required',
            'bearer_name' => 'required',
            'department_office' => 'required',
            'contact_no' => 'required',
            'email' => 'required'
        ];
    }
}
