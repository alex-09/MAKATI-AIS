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
            'period_covered' => 'required',
            'date_of_collection' => 'required',
            'fund_source' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'bearer_name' => 'required',
            'bearer_dept' => 'required',
            'bearer_contact_no' => 'required',
            'status' => 'required'
        ];
    }
}
