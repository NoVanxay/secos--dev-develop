<?php

namespace App\Http\Requests;

use App\Models\Manual;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManualRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('manual_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:5',
                'max:100',
                'required',
                'unique:manuals,name,' . request()->route('manual')->id,
            ],
        ];
    }
}
