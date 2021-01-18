<?php

namespace App\Http\Requests;

use App\Models\School;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSchoolRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('school_create');
    }

    public function rules()
    {
        return [
            'school'   => [
                'string',
                'min:5',
                'max:50',
                'required',
                'unique:schools',
            ],
            'village'  => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'district' => [
                'string',
                'min:5',
                'max:50',
                'required',

            ],
            'province' => [
                'string',
                'min:5',
                'max:50',
                'required',

            ],
        ];
    }
}
