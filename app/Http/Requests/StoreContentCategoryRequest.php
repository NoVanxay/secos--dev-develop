<?php

namespace App\Http\Requests;

use App\Models\ContentCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_category_create');
    }

    public function rules()
    {
        return [
            'content_category' => [
                'string',
                'min:2',
                'max:50',
                'required',
                'unique:content_categories',
            ],
        ];
    }
}
