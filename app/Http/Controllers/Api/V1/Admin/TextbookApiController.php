<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreTextbookRequest;
use App\Http\Requests\UpdateTextbookRequest;
use App\Http\Resources\Admin\TextbookResource;
use App\Models\Textbook;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TextbookApiController extends Controller
{
    use MediaUploadingTrait,CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('textbook_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TextbookResource(Textbook::all());
    }

    public function store(StoreTextbookRequest $request)
    {
        $textbook = Textbook::create($request->all());

        if ($request->input('textbook', false)) {
            $textbook->addMedia(storage_path('tmp/uploads/' . $request->input('textbook')))->toMediaCollection('textbook');
        }

        return (new TextbookResource($textbook))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Textbook $textbook)
    {
        abort_if(Gate::denies('textbook_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TextbookResource($textbook);
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

        return (new TextbookResource($textbook))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Textbook $textbook)
    {
        abort_if(Gate::denies('textbook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $textbook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
