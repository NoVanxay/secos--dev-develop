<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Http\Resources\Admin\AcademicYearResource;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\AcademicYear;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicYearsApiController extends Controller
{
    use CsvImportTrait;
    public function index()
    {
        abort_if(Gate::denies('academic_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AcademicYearResource(AcademicYear::all());
    }

    public function store(StoreAcademicYearRequest $request)
    {
        $academicYear = AcademicYear::create($request->all());

        return (new AcademicYearResource($academicYear))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AcademicYear $academicYear)
    {
        abort_if(Gate::denies('academic_year_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AcademicYearResource($academicYear);
    }

    public function update(UpdateAcademicYearRequest $request, AcademicYear $academicYear)
    {
        $academicYear->update($request->all());

        return (new AcademicYearResource($academicYear))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AcademicYear $academicYear)
    {
        abort_if(Gate::denies('academic_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicYear->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
