<?php

namespace App\Http\Requests;

use App\Constant\app;
use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'required',
            ],
            'last_name'     => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'gender'        => [
                'required',
            ],
            'date_of_birth' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'village'       => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'district'          => [
                'required',
            ],
            'province'          => [
                'required',
            ],
            'phone_no'      => [
                'required',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
                'unique:users,phone_no,' . request()->route('user')->id,
            ],
            'email'         => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*'       => [
                'integer',
            ],
            'roles'         => [
                'required',
                'array',
            ],
        ];
    }
}
