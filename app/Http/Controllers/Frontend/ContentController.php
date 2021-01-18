<?php

namespace App\Http\Controllers\Frontend;

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
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contents = Content::with(['users', 'categories'])->get();

        return view('frontend.contents.index', compact('contents'));
    }

    public function create()
    {
        abort_if(Gate::denies('content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::all()->pluck('content_category', 'id');

        return view('frontend.contents.create', compact('categories'));
    }

    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->all());
        $content->categories()->sync($request->input('categories', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $content->id]);
        }

        return redirect()->route('frontend.contents.index');
    }

    public function edit(Content $content)
    {
        abort_if(Gate::denies('content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::all()->pluck('content_category', 'id');

        $content->load('users', 'categories');

        return view('frontend.contents.edit', compact('categories', 'content'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $content->update($request->all());
        $content->categories()->sync($request->input('categories', []));

        return redirect()->route('frontend.contents.index');
    }

    public function show(Content $content)
    {
        abort_if(Gate::denies('content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $content->load('users', 'categories');

        return view('frontend.contents.show', compact('content'));
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
