<?php

namespace App\Http\Requests\BAT\TrustFund\TrustReceipt;

use Illuminate\Foundation\Http\FormRequest;

class TRRequest extends FormRequest
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
            // 'government_type' => 'required',
            // 'agency_name' => 'required',
            // 'document_source' => 'required|mimes:pdf,doc,docx|max:2048',
            // 'general_description' => 'required',
            // 'nadai_no' => 'required',
            // 'official_receipt_no' => 'required',
            // 'official_receipt_date' => 'required',
            // 'official_receipt_amount' => 'required',
            // 'nadai_date' => 'required',
            // 'main_fund_title' => 'required',
            // 'sub_fund_title' => 'required',
            // 'specific_purpose' => 'required',
            // 'amount_allocated' => 'required',
            // 'implementing_office' => 'required'
        ];
    }
}
