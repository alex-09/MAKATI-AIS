<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApproRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
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
