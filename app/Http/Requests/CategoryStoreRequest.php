<?php

namespace App\Http\Requests;

use App\Enums\ImageMimeType;
use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'cat_name' => 'required|string|max:100',
            'image' => 'nullable|image|max:55000|mimes:'.ImageMimeType::values(),
            'cat_status' => 'required|in:active,inactive',
            'cat_order' => 'required|numeric|regex:/^[1-9][0-9]*$/|min:1',
        ];
    }
}
