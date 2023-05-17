<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class CollectionDeposit extends FormRequest
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

            'incom_transaction_id_no' => 'required',
            'transaction_type' => 'required',
            'sender' => 'required',
            'fund_source' => 'required',
            'rcd_date' => 'required',
            'report_no' => 'required',
            'cashbook_ref_no' => 'required',
            'subject' => 'required',
            'amount_collection' => 'required',
            'amount_deposit' => 'required',
            'cash' => 'required',
            'check' => 'required',
            'online' => 'required',
            'bearer_name' => 'required',
            'address' => 'required',
            'department_office' => 'required',
            'bearer_contact_no' => 'required',
            'status' => 'required'
        ];
    }
}
