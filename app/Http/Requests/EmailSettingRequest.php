<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mail_driver' => 'required|string|max:50',
            'mail_host' => 'required|string|max:100',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required|string|max:100',
            'mail_password' => 'required|string|max:100',
            'mail_encryption' => 'required|string|in:tls,ssl',
            'mail_from_address' => 'required|email|max:100',
            'mail_from_name' => 'required|string|max:100',
        ];
    }
}
