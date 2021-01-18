<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTextbookRequest;
use App\Http\Requests\StoreTextbookRequest;
use App\Http\Requests\UpdateTextbookRequest;
use App\Models\Textbook;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TextbookController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('textbook_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Textbook::query()->select(sprintf('%s.*', (new Textbook)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'textbook_show';
                $editGate      = 'textbook_edit';
                $deleteGate    = 'textbook_delete';
                $crudRoutePart = 'textbooks';

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
            $table->editColumn('textbook', function ($row) {
                return $row->textbook ? '<a href="' . $row->textbook->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'textbook']);

            return $table->make(true);
        }

        return view('admin.textbooks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('textbook_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.textbooks.create');
    }

    public function store(StoreTextbookRequest $request)
    {
        $textbook = Textbook::create($request->all());

        if ($request->input('textbook', false)) {
            $textbook->addMedia(storage_path('tmp/uploads/' . $request->input('textbook')))->toMediaCollection('textbook');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $textbook->id]);
        }

        return redirect()->route('admin.textbooks.index');
    }

    public function edit(Textbook $textbook)
    {
        abort_if(Gate::denies('textbook_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.textbooks.edit', compact('textbook'));
    }

    public function update(UpdateTextbookRequest $request, Textbook $textbook)
    {
        $textbook->update($request->all());

        if ($request->input('textbook', false)) {
            if (!$textbook->textbook || $request->input('textbook') !== $textbook->textbook->file_name) {
                if ($textbook->textbook) {
                    $textbook->textbook->delete();
                }

                $textbook->addMedia(storage_path('tmp/uploads/' . $request->input('textbook')))->toMediaCollection('textbook');
            }
        } elseif ($textbook->textbook) {
            $textbook->textbook->delete();
        }

        return redirect()->route('admin.textbooks.index');
    }

    public function show(Textbook $textbook)
    {
        abort_if(Gate::denies('textbook_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.textbooks.show', compact('textbook'));
    }

    public function destroy(Textbook $textbook)
    {
        abort_if(Gate::denies('textbook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $textbook->delete();

        return back();
    }

    public function massDestroy(MassDestroyTextbookRequest $request)
    {
        Textbook::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('textbook_create') && Gate::denies('textbook_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Textbook();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
