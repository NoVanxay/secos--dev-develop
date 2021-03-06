<?php

namespace App\Http\Requests;

use App\Models\HistoryAdminTeacher;
use Gate;
use App\Constant\app;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHistoryAdminTeacherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('history_admin_teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:history_admin_teachers,id',
        ];
    }
}
