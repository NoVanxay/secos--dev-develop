<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreHistoryAdminTeacherRequest;
use App\Http\Requests\UpdateHistoryAdminTeacherRequest;
use App\Http\Resources\Admin\HistoryAdminTeacherResource;
use App\Models\HistoryAdminTeacher;
use Gate;
use App\Constant\app;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HistoryAdminTeachersApiController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('history_admin_teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HistoryAdminTeacherResource(HistoryAdminTeacher::all());
    }

    public function store(StoreHistoryAdminTeacherRequest $request)
    {
        $historyAdminTeacher = HistoryAdminTeacher::create($request->all());

        if ($request->input('photo', false)) {
            $historyAdminTeacher->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new HistoryAdminTeacherResource($historyAdminTeacher))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HistoryAdminTeacher $historyAdminTeacher)
    {
        abort_if(Gate::denies('history_admin_teacher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HistoryAdminTeacherResource($historyAdminTeacher);
    }

    public function update(UpdateHistoryAdminTeacherRequest $request, HistoryAdminTeacher $historyAdminTeacher)
    {
        $historyAdminTeacher->update($request->all());

        if ($request->input('photo', false)) {
            if (!$historyAdminTeacher->photo || $request->input('photo') !== $historyAdminTeacher->photo->file_name) {
                if ($historyAdminTeacher->photo) {
                    $historyAdminTeacher->photo->delete();
                }

                $historyAdminTeacher->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($historyAdminTeacher->photo) {
            $historyAdminTeacher->photo->delete();
        }

        return (new HistoryAdminTeacherResource($historyAdminTeacher))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HistoryAdminTeacher $historyAdminTeacher)
    {
        abort_if(Gate::denies('history_admin_teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $historyAdminTeacher->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
