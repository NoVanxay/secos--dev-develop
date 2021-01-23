<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHistoryAdminTeacherRequest;
use App\Http\Requests\StoreHistoryAdminTeacherRequest;
use App\Http\Requests\UpdateHistoryAdminTeacherRequest;
use App\Models\HistoryAdminTeacher;
use Gate;
use App\Constant\app;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HistoryAdminTeachersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('history_admin_teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $historyAdminTeachers = HistoryAdminTeacher::with(['media'])->get();

        return view('frontend.historyAdminTeachers.index', compact('historyAdminTeachers'));
    }

    public function create()
    {
        abort_if(Gate::denies('history_admin_teacher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.historyAdminTeachers.create');
    }

    public function store(StoreHistoryAdminTeacherRequest $request)
    {
        $historyAdminTeacher = HistoryAdminTeacher::create($request->all());

        if ($request->input('photo', false)) {
            $historyAdminTeacher->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $historyAdminTeacher->id]);
        }

        return redirect()->route('frontend.history-admin-teachers.index');
    }

    public function edit(HistoryAdminTeacher $historyAdminTeacher)
    {
        abort_if(Gate::denies('history_admin_teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.historyAdminTeachers.edit', compact('historyAdminTeacher'));
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

        return redirect()->route('frontend.history-admin-teachers.index');
    }

    public function show(HistoryAdminTeacher $historyAdminTeacher)
    {
        abort_if(Gate::denies('history_admin_teacher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.historyAdminTeachers.show', compact('historyAdminTeacher'));
    }

    public function destroy(HistoryAdminTeacher $historyAdminTeacher)
    {
        abort_if(Gate::denies('history_admin_teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $historyAdminTeacher->delete();

        return back();
    }

    public function massDestroy(MassDestroyHistoryAdminTeacherRequest $request)
    {
        HistoryAdminTeacher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('history_admin_teacher_create') && Gate::denies('history_admin_teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HistoryAdminTeacher();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
