<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTemplateRequest;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TemplateController extends Controller
{
    use MediaUploadingTrait , CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Template::query()->select(sprintf('%s.*', (new Template)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'template_show';
                $editGate      = 'template_edit';
                $deleteGate    = 'template_delete';
                $crudRoutePart = 'templates';

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
            $table->editColumn('template', function ($row) {
                return $row->template ? '<a href="' . $row->template->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'template']);

            return $table->make(true);
        }

        return view('admin.templates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.templates.create');
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = Template::create($request->all());

        if ($request->input('template', false)) {
            $template->addMedia(storage_path('tmp/uploads/' . $request->input('template')))->toMediaCollection('template');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $template->id]);
        }

        return redirect()->route('admin.templates.index');
    }

    public function edit(Template $template)
    {
        abort_if(Gate::denies('template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.templates.edit', compact('template'));
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update($request->all());

        if ($request->input('template', false)) {
            if (!$template->template || $request->input('template') !== $template->template->file_name) {
                if ($template->template) {
                    $template->template->delete();
                }

                $template->addMedia(storage_path('tmp/uploads/' . $request->input('template')))->toMediaCollection('template');
            }
        } elseif ($template->template) {
            $template->template->delete();
        }

        return redirect()->route('admin.templates.index');
    }

    public function show(Template $template)
    {
        abort_if(Gate::denies('template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.templates.show', compact('template'));
    }

    public function destroy(Template $template)
    {
        abort_if(Gate::denies('template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template->delete();

        return back();
    }

    public function massDestroy(MassDestroyTemplateRequest $request)
    {
        Template::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('template_create') && Gate::denies('template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Template();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
