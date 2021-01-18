<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClassRoomRequest;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\School;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClassRoomController extends Controller
{
    use CsvImportTrait;
    public function index(Request $request)
    {
        abort_if(Gate::denies('class_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClassRoom::with(['schools'])->select(sprintf('%s.*', (new ClassRoom)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'class_room_show';
                $editGate      = 'class_room_edit';
                $deleteGate    = 'class_room_delete';
                $crudRoutePart = 'class-rooms';

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
            $table->editColumn('class_room', function ($row) {
                return $row->class_room ? $row->class_room : "";
            });
            $table->editColumn('school', function ($row) {
                $labels = [];

                foreach ($row->schools as $school) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $school->school);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'school']);

            return $table->make(true);
        }

        return view('admin.classRooms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('class_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schools = School::all()->pluck('school', 'id');

        return view('admin.classRooms.create', compact('schools'));
    }

    public function store(StoreClassRoomRequest $request)
    {
        $classRoom = ClassRoom::create($request->all());
        $classRoom->schools()->sync($request->input('schools', []));

        return redirect()->route('admin.class-rooms.index');
    }

    public function edit(ClassRoom $classRoom)
    {
        abort_if(Gate::denies('class_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schools = School::all()->pluck('school', 'id');

        $classRoom->load('schools');

        return view('admin.classRooms.edit', compact('schools', 'classRoom'));
    }

    public function update(UpdateClassRoomRequest $request, ClassRoom $classRoom)
    {
        $classRoom->update($request->all());
        $classRoom->schools()->sync($request->input('schools', []));

        return redirect()->route('admin.class-rooms.index');
    }

    public function show(ClassRoom $classRoom)
    {
        abort_if(Gate::denies('class_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classRoom->load('schools', 'classroomStudents', 'classroomSubjects');

        return view('admin.classRooms.show', compact('classRoom'));
    }

    public function destroy(ClassRoom $classRoom)
    {
        abort_if(Gate::denies('class_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classRoom->delete();

        return back();
    }

    public function massDestroy(MassDestroyClassRoomRequest $request)
    {
        ClassRoom::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
