<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreManualRequest;
use App\Http\Requests\UpdateManualRequest;
use App\Http\Resources\Admin\ManualResource;
use App\Models\Manual;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManualApiController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('manual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManualResource(Manual::all());
    }

    public function store(StoreManualRequest $request)
    {
        $manual = Manual::create($request->all());

        if ($request->input('manual', false)) {
            $manual->addMedia(storage_path('tmp/uploads/' . $request->input('manual')))->toMediaCollection('manual');
        }

        return (new ManualResource($manual))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Manual $manual)
    {
        abort_if(Gate::denies('manual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManualResource($manual);
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

        return (new ManualResource($manual))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Manual $manual)
    {
        abort_if(Gate::denies('manual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manual->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
