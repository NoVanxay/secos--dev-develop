<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAnnoucementRequest;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;
use App\Models\Annoucement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AnnoucementController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('annoucement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $annoucements = Annoucement::with(['media'])->get();

        return view('frontend.annoucements.index', compact('annoucements'));
    }

    public function create()
    {
        abort_if(Gate::denies('annoucement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.annoucements.create');
    }

    public function store(StoreAnnoucementRequest $request)
    {
        $annoucement = Annoucement::create($request->all());

        if ($request->input('annoucement', false)) {
            $annoucement->addMedia(storage_path('tmp/uploads/' . $request->input('annoucement')))->toMediaCollection('annoucement');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $annoucement->id]);
        }

        return redirect()->route('frontend.annoucements.index');
    }

    public function edit(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.annoucements.edit', compact('annoucement'));
    }

    public function update(UpdateAnnoucementRequest $request, Annoucement $annoucement)
    {
        $annoucement->update($request->all());

        if ($request->input('annoucement', false)) {
            if (!$annoucement->annoucement || $request->input('annoucement') !== $annoucement->annoucement->file_name) {
                if ($annoucement->annoucement) {
                    $annoucement->annoucement->delete();
                }

                $annoucement->addMedia(storage_path('tmp/uploads/' . $request->input('annoucement')))->toMediaCollection('annoucement');
            }
        } elseif ($annoucement->annoucement) {
            $annoucement->annoucement->delete();
        }

        return redirect()->route('frontend.annoucements.index');
    }

    public function show(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.annoucements.show', compact('annoucement'));
    }

    public function destroy(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $annoucement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnnoucementRequest $request)
    {
        Annoucement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('annoucement_create') && Gate::denies('annoucement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Annoucement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
