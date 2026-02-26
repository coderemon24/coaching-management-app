<?php

namespace App\Http\Requests;

use App\Enums\ImageMimeType;
use Illuminate\Foundation\Http\FormRequest;

class MaintenanceModeRequest extends FormRequest
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
            'status' => 'required|string|in:activated,deactivated',
            'maintenance_message' => 'required|string|max:255',
            'image' => 'nullable|max:5500|mimes:'.ImageMimeType::values(),
            'bypass_token' => 'required|string|max:50',
        ];
    }
}
