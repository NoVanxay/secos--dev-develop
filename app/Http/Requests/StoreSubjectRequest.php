<?php

namespace App\Http\Requests;

use App\Models\Subject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subject_create');
    }

    public function rules()
    {
        return [
            'subject_code' => [
                'string',
                'min:2',
                'max:30',
                'nullable',
            ],
            'subject'      => [
                'string',
                'min:2',
                'max:50',
                'required',
                'unique:subjects',
            ],
            'classrooms.*' => [
                'integer',
            ],
            'classrooms'   => [
                'required',
                'array',
            ],
        ];
    }
}
