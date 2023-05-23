<?php

namespace App\Http\Requests\BAT\TrustFund\TrustReceipt;

use Illuminate\Foundation\Http\FormRequest;

class TRObligationRequest extends FormRequest
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
            'furs_amount' => 'required',
            'implemeting_office' => 'required',
            'particulars' => 'required',
            'furs_amount' => 'required',
            'transaction_type' => 'required',
            'purchase_req_no' => 'required',
            'purchase_req_date' => 'required',
            'payee' => 'required',
            'requesting_official' => 'required', 

            'src_of_tf' => 'required',
            'main_fund_title' => 'required',
            'company' => 'required',
            'sub_fund_title' => 'required',
            'latest_bal_tf' => 'required',
            'account_title' => 'required',
            'account_code' => 'required',
            'amount_obligated' => 'required',
            'balance' => 'required',
            'remarks' => 'required',
        ];
    }
}
