<?php

namespace App\Http\Requests;

use App\Models\Book;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_create');
    }

    public function rules()
    {
        return [
            'book'        => [
                'required',
            ],
            'name'        => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'category_id' => [
                'required',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
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
