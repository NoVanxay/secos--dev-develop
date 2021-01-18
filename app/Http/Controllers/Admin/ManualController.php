<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyManualRequest;
use App\Http\Requests\StoreManualRequest;
use App\Http\Requests\UpdateManualRequest;
use App\Models\Manual;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\CsvImportTrait;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ManualController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('manual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Manual::query()->select(sprintf('%s.*', (new Manual)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'manual_show';
                $editGate      = 'manual_edit';
                $deleteGate    = 'manual_delete';
                $crudRoutePart = 'manuals';

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
            $table->editColumn('manual', function ($row) {
                return $row->manual ? '<a href="' . $row->manual->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'manual']);

            return $table->make(true);
        }

        return view('admin.manuals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manual_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manuals.create');
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

        return redirect()->route('admin.manuals.index');
    }

    public function edit(Manual $manual)
    {
        abort_if(Gate::denies('manual_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manuals.edit', compact('manual'));
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

        return redirect()->route('admin.manuals.index');
    }

    public function show(Manual $manual)
    {
        abort_if(Gate::denies('manual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manuals.show', compact('manual'));
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
