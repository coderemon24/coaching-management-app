<?php

namespace App\Http\Requests;

use App\Enums\Status;
use App\Enums\ImageMimeType;
use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
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
            'site_name' => 'required|string|max:50',
            'site_title' => 'required|string|max:100',
            'site_logo' => 'nullable|image|max:55000|mimes:'.ImageMimeType::values(),
            'site_favicon' => 'nullable|image|max:55000|mimes:'.ImageMimeType::values(),
            'timezone' => 'required|string|max:50',
            'currency' => 'required|string|max:10',
            'currency_position' => 'required|string|in:left,right',
            'currency_text' => 'required|string|max:10',
            'currency_text_position' => 'required|string|in:left,right',
            'currency_rate' => 'required|numeric|min:0',
            'site_color' => 'required|string|max:7',
        ];
    }
}
