<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContentRequest;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Models\ContentCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\CsvImportTrait;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Content::with(['users', 'categories'])->select(sprintf('%s.*', (new Content)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'content_show';
                $editGate      = 'content_edit';
                $deleteGate    = 'content_delete';
                $crudRoutePart = 'contents';

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
            $table->addColumn('users_name', function ($row) {
                return $row->users ? $row->users->name : '';
            });

            $table->editColumn('users.last_name', function ($row) {
                return $row->users ? (is_string($row->users) ? $row->users : $row->users->last_name) : '';
            });
            $table->editColumn('category', function ($row) {
                $labels = [];

                foreach ($row->categories as $category) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $category->content_category);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'users', 'category']);

            return $table->make(true);
        }

        return view('admin.contents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::all()->pluck('content_category', 'id');

        return view('admin.contents.create', compact('categories'));
    }

    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->all());
        $content->categories()->sync($request->input('categories', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $content->id]);
        }

        return redirect()->route('admin.contents.index');
    }

    public function edit(Content $content)
    {
        abort_if(Gate::denies('content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::all()->pluck('content_category', 'id');

        $content->load('users', 'categories');

        return view('admin.contents.edit', compact('categories', 'content'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $content->update($request->all());
        $content->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.contents.index');
    }

    public function show(Content $content)
    {
        abort_if(Gate::denies('content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $content->load('users', 'categories');

        return view('admin.contents.show', compact('content'));
    }

    public function destroy(Content $content)
    {
        abort_if(Gate::denies('content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $content->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentRequest $request)
    {
        Content::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('content_create') && Gate::denies('content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Content();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
