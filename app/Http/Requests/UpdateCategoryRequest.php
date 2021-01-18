<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_edit');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'min:5',
                'max:50',
                'required',
                'unique:categories,category,' . request()->route('category')->id,
            ],
        ];
    }
}
