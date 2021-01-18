<?php

namespace App\Http\Requests;

use App\Models\Content;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_edit');
    }

    public function rules()
    {
        return [
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
            'title'        => [
                'string',
                'required',
            ],
            'content'      => [
                'required',
            ],
        ];
    }
}
