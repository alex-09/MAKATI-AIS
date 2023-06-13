<?php

namespace App\Http\Requests\BAT\TrustFund\TrustReceipt;

use Illuminate\Foundation\Http\FormRequest;

class LGURequest extends FormRequest
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
            // 'general_description' => 'required',
            // 'legal_basis' => 'required',
            // 'main_fund_title' => 'required',
            // 'sub_fund_title' => 'required',
            // 'specific_purpose' => 'required',
            // 'amount_allocated' => 'required',
            // 'implementing_office' => 'required',
        ];
    }
}
