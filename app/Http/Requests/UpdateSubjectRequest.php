<?php

namespace App\Http\Requests;

use App\Models\Subject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subject_edit');
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
                'unique:subjects,subject,' . request()->route('subject')->id,
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
