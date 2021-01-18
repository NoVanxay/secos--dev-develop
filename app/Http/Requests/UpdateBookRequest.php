<?php

namespace App\Http\Requests;

use App\Models\Book;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'publisher'   => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'page'        => [
                'required',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'isbn'        => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
        ];
    }
}
