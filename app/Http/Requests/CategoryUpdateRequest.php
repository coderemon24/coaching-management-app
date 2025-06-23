<?php

namespace App\Http\Requests;

use App\Enums\ImageMimeType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $uniqueId = $this->input('unique_id');
        $cat_id = $this->input('cat_id');

        $rules = [];

        if ($this->has('cat_name')) {
            $rules['cat_name'] = [
                'string',
                'max:100',
                Rule::unique('categories', 'cat_name')
                    ->ignore($cat_id),
            ];
        }

        if ($this->has('cat_order')) {
            $rules['cat_order'] = [
                'numeric',
                'regex:/^[1-9][0-9]*$/',
                'min:1',
                Rule::unique('categories', 'cat_order')
                    ->where(function ($query) use ($uniqueId) {
                        return $query->where('unique_id', '!=', $uniqueId);
                    }),
            ];
        }

        $rules['image'] = [
            'nullable',
            'image',
            'max:55000',
            'mimes:' . ImageMimeType::values(),
        ];

        $rules['cat_status'] = ['required', 'in:active,inactive'];
        $rules['is_featured'] = ['required', 'in:active,inactive'];

        return $rules;
    }
}
