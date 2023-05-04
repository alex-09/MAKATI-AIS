<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class COAUploadRequest extends FormRequest
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
            'date' => ['required'],
            'title' => ['required'],
            'file' => ['required', 'mimes:csv', 'unique:coa_assets,date_effect_index'],
        ];
    }
}
