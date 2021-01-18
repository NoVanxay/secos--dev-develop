<?php

namespace App\Http\Requests;

use App\Models\Annoucement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnnoucementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('annoucement_create');
    }

    public function rules()
    {
        return [
            'annoucement' => [
                'required',
            ],
            'name'        => [
                'string',
                'min:5',
                'max:60',
                'required',
            ],
            'number'      => [
                'required',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'short_name'  => [
                'string',
                'min:1',
                'max:10',
                'required',
            ],
            'allow_date'  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
