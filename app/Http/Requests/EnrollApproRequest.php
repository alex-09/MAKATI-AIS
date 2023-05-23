<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollApproRequest extends FormRequest
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

            'budget_year_id' => ['required'],
            'fundSource_id' => ['required'],
            'reference_document' => ['required'],
            'approType_id' => ['required'],
            'department_code_id' => ['required'],
            'appro_id' => 'string',

            'program' => ['required'],
            'program_code' => ['required'],
            'project' => ['required'],
            'project_code' => ['required'],
            'activity' => ['required'],
            'activity_code' => ['required'],
            'activity_description' => ['required'],
            'appro_total' => ['required'],
            'account_code' => ['required'],
            'account_name' => ['required'],
            'appro_amount' => ['required'],

        ];
    }
}
