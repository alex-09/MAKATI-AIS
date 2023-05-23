<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class COARequest extends FormRequest
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
            'account_group' => ['required','max:2','min:2'],
            'major_account_group' => ['required','max:2','min:2'],
            'sub_major_account_group' => ['required','max:2','min:2'],
            'general_ledger_accounts' => ['required','max:3','min:3'],
            'sub_ledger_accounts' => ['required','max:3','min:3'],
            'sub_sub_ledger_accounts' => ['required','max:3','min:3'],
            'account_title' => 'required',
            'account_code' => 'string',
            'description' => 'string',
            'date_effectivity' => 'string',
            'coa_title' => 'string'
        ];
    }
}
