<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class PayrollAndAppointment extends FormRequest
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
        'transaction_type' => 'required',
        'fund_source' => 'required',
        'cafoa_obr' => 'required',
        'caf' => 'required',
        'department' => 'required',
        'payroll_type' => 'required',
        'personnel_number' => 'required',
        'employment_type' => 'required',
        'amount' => 'required',
        'covered_from' => 'required',
        'covered_to' => 'required',
        'subject' => 'required',
        'bearer_name' => 'required',
        'bearer_address' => 'required',
        'bearer_contact' => 'required',
        'bearer_dept' => 'required',
        'document' => 'required',
        ];
    }
}
