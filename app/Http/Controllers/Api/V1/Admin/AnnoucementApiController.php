<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;
use App\Http\Resources\Admin\AnnoucementResource;
use App\Models\Annoucement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnnoucementApiController extends Controller
{
    use MediaUploadingTrait,CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('annoucement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnnoucementResource(Annoucement::all());
    }

    public function store(StoreAnnoucementRequest $request)
    {
        $annoucement = Annoucement::create($request->all());

        if ($request->input('annoucement', false)) {
            $annoucement->addMedia(storage_path('tmp/uploads/' . $request->input('annoucement')))->toMediaCollection('annoucement');
        }

        return (new AnnoucementResource($annoucement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AnnoucementResource($annoucement);
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

        return (new AnnoucementResource($annoucement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Annoucement $annoucement)
    {
        abort_if(Gate::denies('annoucement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $annoucement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
