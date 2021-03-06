<?php

namespace App\Http\Requests;

use App\Models\School;
use App\Constant\App;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSchoolRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('school_edit');
    }

    public function rules()
    {
        return [
            'school'   => [
                'string',
                'min:5',
                'max:50',
                'required',
                'unique:schools,school,' . request()->route('school')->id,
            ],
            'village'  => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'district' => [
                'required',
            ],
            'province' => [
                'required',

            ],
        ];
    }
}
