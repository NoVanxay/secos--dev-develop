<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcademicYearRequest;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Models\AcademicYear;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AcademicYearsController extends Controller
{
    use CsvImportTrait;


    public function index(Request $request)
    {
        abort_if(Gate::denies('academic_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AcademicYear::query()->select(sprintf('%s.*', (new AcademicYear)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'academic_year_show';
                $editGate      = 'academic_year_edit';
                $deleteGate    = 'academic_year_delete';
                $crudRoutePart = 'academic-years';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.academicYears.index');
    }

    public function create()
    {
        abort_if(Gate::denies('academic_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicYears.create');
    }

    public function store(StoreAcademicYearRequest $request)
    {
        $academicYear = AcademicYear::create($request->all());

        return redirect()->route('admin.academic-years.index');
    }

    public function edit(AcademicYear $academicYear)
    {
        abort_if(Gate::denies('academic_year_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicYears.edit', compact('academicYear'));
    }

    public function update(UpdateAcademicYearRequest $request, AcademicYear $academicYear)
    {
        $academicYear->update($request->all());

        return redirect()->route('admin.academic-years.index');
    }

    public function show(AcademicYear $academicYear)
    {
        abort_if(Gate::denies('academic_year_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicYear->load('academicYearsStudents');

        return view('admin.academicYears.show', compact('academicYear'));
    }

    public function destroy(AcademicYear $academicYear)
    {
        abort_if(Gate::denies('academic_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicYear->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcademicYearRequest $request)
    {
        AcademicYear::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
