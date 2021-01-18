<?php

namespace App\Http\Requests;

use App\Models\Template;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('template_create');
    }

    public function rules()
    {
        return [
            'template' => [
                'required',
            ],
            'name'     => [
                'string',
                'min:5',
                'max:50',
                'required',
                'unique:templates',
            ],
        ];
    }
}
