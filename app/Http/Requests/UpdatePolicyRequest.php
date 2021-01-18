<?php

namespace App\Http\Requests;

use App\Models\Policy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePolicyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('policy_edit');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'min:5',
                'max:60',
                'required',
            ],
            'lavel_no'    => [
                'string',
                'min:2',
                'max:20',
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
