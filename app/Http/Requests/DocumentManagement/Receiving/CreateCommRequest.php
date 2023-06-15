<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommRequest extends FormRequest
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
            'mc_no' => 'string',
            'receive_comm_type_id' => 'required',
            'sender' => 'required',
            'subject' => 'required',
            'reply_to' => 'required',
            'creator' => 'required',
            'department' => 'required',
            'particulars' => 'required',
        ];
    }
}
