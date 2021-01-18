<?php

namespace App\Http\Requests;

use App\Models\Policy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePolicyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('policy_create');
    }

    public function rules()
    {
        return [
            'policy'      => [
                'required',
            ],
            'name'        => [
                'string',
                'min:5',
                'max:60',
                'required',
            ],
            'lavel_no'    => [
                'string',
                'min:-2147483648',
                'max:2147483647',
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
