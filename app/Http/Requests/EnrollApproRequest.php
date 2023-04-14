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

            'program' => ['required', 'string'],
            'program_code' => ['required', 'integer'],

            'project' => ['required', 'string'],
            'project_code' => ['required', 'integer'],

            'activity' => ['required', 'string'],
            'activity_code' => ['required', 'integer'],
            'activity_description' => ['required', 'string'],
            'appro_total' => ['required', 'numeric'],

            'account_code' => ['required', 'integer '],
            'account_name' => ['required', 'string'],
            'appro_amount' => ['required', 'numeric'],

        ];
    }
}
