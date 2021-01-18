<?php

namespace App\Http\Requests;

use App\Models\AcademicYear;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAcademicYearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('academic_year_create');
    }

    public function rules()
    {
        return [
            'title'      => [
                'string',
                'required',
                'unique:academic_years',
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
