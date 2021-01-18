<?php

namespace App\Http\Requests;

use App\Models\Textbook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTextbookRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('textbook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:textbooks,id',
        ];
    }
}
