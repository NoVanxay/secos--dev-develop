<?php

namespace App\Http\Requests;

use App\Models\AcademicYear;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAcademicYearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('academic_year_edit');
    }

    public function rules()
    {
        return [
            'title'      => [
                'string',
                'required',
                'unique:academic_years,title,' . request()->route('academic_year')->id,
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
