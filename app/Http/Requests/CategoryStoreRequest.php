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
        $rules = [
            'image' => 'nullable|image|max:55000|mimes:' . ImageMimeType::values(),
            'cat_status' => 'required|in:active,inactive',
            'cat_order' => 'required|numeric|regex:/^[1-9][0-9]*$/|min:1',
        ];

        $languages = app('languages');

        foreach ($languages as $lang) {
            if ($lang->frontend_default == 1 || $lang->dashboard_default == 1) {
                $rules[$lang->code . '_name'] = 'required|string|max:100|unique:categories,cat_name';
            } else {
                $rules[$lang->code . '_name'] = 'nullable|string|max:100|unique:categories,cat_name';
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'image.image' => 'Category image must be an image.',
            'image.max' => 'Category image size must not exceed 55KB.',
            'image.mimes' => 'Category image must be a JPEG, PNG, or JPG file.',
            'cat_status.required' => 'Category status is required.',
            'cat_status.in' => 'Category status must be active or inactive.',
            'cat_order.required' => 'Category order is required.',
            'cat_order.numeric' => 'Category order must be a number.',
            'cat_order.regex' => 'Category order must be a positive number.',
            'cat_order.min' => 'Category order must be at least 1.',
            'cat_order.unique' => 'Category order already exists.',
        ];

        $languages = app('languages');

        foreach ($languages as $lang) {
            if ($lang->frontend_default == 1 || $lang->dashboard_default == 1) {
                $messages[$lang->code . '_name.required'] = $lang->name . ' category name is required.';
                $messages[$lang->code . '_name.unique'] = $lang->name . ' category name already exists.';
                $messages[$lang->code . '_name.string'] = $lang->name . ' category name must be a string.';
                $messages[$lang->code . '_name.max'] = $lang->name . ' category name must not exceed 100 characters.';
            } else {
                $messages[$lang->code . '_name.string'] = $lang->name . ' category name must be a string.';
                $messages[$lang->code . '_name.max'] = $lang->name . ' category name must not exceed 100 characters.';
                $messages[$lang->code . '_name.unique'] = $lang->name . ' category name already exists.';
            }
        }

        return $messages;
    }
}
