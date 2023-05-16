<?php

namespace App\Http\Requests\DocumentManagement\Receiving;

use Illuminate\Foundation\Http\FormRequest;

class CommRequest extends FormRequest
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
            'receive_comm_type_id' => 'required',
            'subject' => 'required',
            'department' => 'required',
            'document' => 'mimes:jpeg,jpg,JPG,doc,docx,pdf|max:2048',
            'email' => 'required',
            'DRN' => 'required',
            'reply_to' => 'required',
            'sender' => 'required',
            'contact_no' => 'string',
            'bearer_name' => 'required',
            'bearer_address' => 'required',
            'bearer_contact_no' => 'required',
            'bearer_department' => 'required'
        ];
    }
}
