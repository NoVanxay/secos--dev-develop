<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use App\Constant\App;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_create');
    }

    public function rules()
    {
        return [
            'st_code'           => [
                'string',
                'min:2',
                'max:50',
                'required',
                'unique:students',
            ],
            'first_name'        => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'last_name'         => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'gender'            => [
                'required',
            ],
            'date_of_birth'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'village'           => [
                'string',
                'min:2',
                'max:100',
                'required',
            ],
            'district'          => [
                'required',
            ],
            'province'          => [
                'required',
            ],
            'father_name'       => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'father_no'         => [
                'nullable',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mother_name'       => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'mother_no'         => [
                'nullable',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'classroom_id'      => [
                'required',
                'integer',
            ],
            'school_id'         => [
                'required',
                'integer',
            ],
            'academic_years_id' => [
                'required',
                'integer',
            ],
            'end_from'          => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'phone_no'          => [
                'nullable',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'note'              => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'email'          => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'password'          => [
                'nullable',
            ],
            'roles_id'          => [
                'required',
                'integer',
            ],
        ];
    }
}
