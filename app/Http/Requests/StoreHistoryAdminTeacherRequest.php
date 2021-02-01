<?php

namespace App\Http\Requests;

use App\Models\HistoryAdminTeacher;
use Gate;
use App\Constant\app;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHistoryAdminTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('history_admin_teacher_create');
    }

    public function rules()
    {
        return [
            'title'               => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'photo'               => [
                'required',
            ],
            'fist_name'           => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'last_name'           => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'gender'              => [
                'required',
            ],
            'eng_name'            => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'eng_last'            => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'date_of_birth'       => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'text'                => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'tribes'              => [
                'string',
                'min:2',
                'max:20',
                'required',
            ],
            'religion'            => [
                'required',
            ],
            'pabbajja'            => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'identification_card' => [
                'string',
                'min:2',
                'max:30',
                'required',
            ],
            'province_birth'      => [
                'required',
            ],
            'district_birth'      => [
                'required',
            ],
            'village_birth'       => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'current_province'    => [
                'required',
            ],
            'current_district'    => [
                'required',
            ],
            'current_village'     => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
            'temple'              => [
                'string',
                'min:5',
                'max:50',
                'required',
            ],
            'phone_no_1'          => [
                'required',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
                'unique:history_admin_teachers,phone_no_1',
            ],
            'phone_no_2'          => [
                'nullable',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'office_phone'        => [
                'nullable',
                'numeric',
                'min:-2147483648',
                'max:2147483647',
            ],
            'census'              => [
                'string',
                'min:2',
                'max:20',
                'required',
                'unique:history_admin_teachers',
            ],
            'allow_date'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'live_at'             => [
                'string',
                'min:2',
                'max:50',
                'required',
            ],
        ];
    }
}
