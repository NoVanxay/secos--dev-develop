<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubjectRequest;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\ClassRoom;
use App\Models\Subject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    use CsvImportTrait;
    public function index(Request $request)
    {
        abort_if(Gate::denies('subject_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Subject::with(['classrooms'])->select(sprintf('%s.*', (new Subject)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'subject_show';
                $editGate      = 'subject_edit';
                $deleteGate    = 'subject_delete';
                $crudRoutePart = 'subjects';

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
            $table->editColumn('subject_code', function ($row) {
                return $row->subject_code ? $row->subject_code : "";
            });
            $table->editColumn('subject', function ($row) {
                return $row->subject ? $row->subject : "";
            });
            $table->editColumn('classroom', function ($row) {
                $labels = [];

                foreach ($row->classrooms as $classroom) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $classroom->class_room);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'classroom']);

            return $table->make(true);
        }

        return view('admin.subjects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classrooms = ClassRoom::all()->pluck('class_room', 'id');

        return view('admin.subjects.create', compact('classrooms'));
    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->all());
        $subject->classrooms()->sync($request->input('classrooms', []));

        return redirect()->route('admin.subjects.index');
    }

    public function edit(Subject $subject)
    {
        abort_if(Gate::denies('subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classrooms = ClassRoom::all()->pluck('class_room', 'id');

        $subject->load('classrooms');

        return view('admin.subjects.edit', compact('classrooms', 'subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        $subject->classrooms()->sync($request->input('classrooms', []));

        return redirect()->route('admin.subjects.index');
    }

    public function show(Subject $subject)
    {
        abort_if(Gate::denies('subject_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->load('classrooms');

        return view('admin.subjects.show', compact('subject'));
    }

    public function destroy(Subject $subject)
    {
        abort_if(Gate::denies('subject_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subject->delete();

        return back();
    }

    public function massDestroy(MassDestroySubjectRequest $request)
    {
        Subject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
