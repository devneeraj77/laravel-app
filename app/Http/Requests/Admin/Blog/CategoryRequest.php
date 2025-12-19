<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Determine the Category ID if it's an update request
        $categoryId = $this->route('category')->id ?? null;

        return [
            'name' => ['required', 'string', 'max:100'],
            // Slug must be unique, ignoring the current category's ID during update
            'slug' => [
                'nullable', 
                'string', 
                'max:100', 
                Rule::unique('categories')->ignore($categoryId),
            ],
        ];
    }
}