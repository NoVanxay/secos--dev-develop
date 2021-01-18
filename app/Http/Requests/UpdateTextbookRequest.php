<?php

namespace App\Http\Requests;

use App\Models\Textbook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTextbookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('textbook_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:5',
                'max:100',
                'required',
                'unique:textbooks,name,' . request()->route('textbook')->id,
            ],
        ];
    }
}
