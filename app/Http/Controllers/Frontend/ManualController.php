<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyManualRequest;
use App\Http\Requests\StoreManualRequest;
use App\Http\Requests\UpdateManualRequest;
use App\Models\Manual;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ManualController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('manual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manuals = Manual::with(['media'])->get();

        return view('frontend.manuals.index', compact('manuals'));
    }

    public function create()
    {
        abort_if(Gate::denies('manual_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.manuals.create');
    }

    public function store(StoreManualRequest $request)
    {
        $manual = Manual::create($request->all());

        if ($request->input('manual', false)) {
            $manual->addMedia(storage_path('tmp/uploads/' . $request->input('manual')))->toMediaCollection('manual');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $manual->id]);
        }

        return redirect()->route('frontend.manuals.index');
    }

    public function edit(Manual $manual)
    {
        abort_if(Gate::denies('manual_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.manuals.edit', compact('manual'));
    }

    public function update(UpdateManualRequest $request, Manual $manual)
    {
        $manual->update($request->all());

        if ($request->input('manual', false)) {
            if (!$manual->manual || $request->input('manual') !== $manual->manual->file_name) {
                if ($manual->manual) {
                    $manual->manual->delete();
                }

                $manual->addMedia(storage_path('tmp/uploads/' . $request->input('manual')))->toMediaCollection('manual');
            }
        } elseif ($manual->manual) {
            $manual->manual->delete();
        }

        return redirect()->route('frontend.manuals.index');
    }

    public function show(Manual $manual)
    {
        abort_if(Gate::denies('manual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.manuals.show', compact('manual'));
    }

    public function destroy(Manual $manual)
    {
        abort_if(Gate::denies('manual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manual->delete();

        return back();
    }

    public function massDestroy(MassDestroyManualRequest $request)
    {
        Manual::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('manual_create') && Gate::denies('manual_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Manual();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
