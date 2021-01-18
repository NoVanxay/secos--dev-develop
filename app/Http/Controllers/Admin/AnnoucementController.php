<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAnnoucementRequest;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;
use App\Models\Annoucement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\CsvImportTrait;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AnnoucementController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('annoucement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Annoucement::query()->select(sprintf('%s.*', (new Annoucement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'annoucement_show';
                $editGate      = 'annoucement_edit';
                $deleteGate    = 'annoucement_delete';
                $crudRoutePart = 'annoucements';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('annoucement', function ($row) {
                return $row->annoucement ? '<a href="' . $row->annoucement->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('short_name', function ($row) {
                return $row->short_name ? $row->short_name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'annoucement']);

            return $table->make(true);
        }

        return view('admin.annoucements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('annoucement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.annoucements.create');
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

        return redirect()->route('admin.annoucements.index');
    }

    public function edit(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.annoucements.edit', compact('annoucement'));
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

        return redirect()->route('admin.annoucements.index');
    }

    public function show(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.annoucements.show', compact('annoucement'));
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
