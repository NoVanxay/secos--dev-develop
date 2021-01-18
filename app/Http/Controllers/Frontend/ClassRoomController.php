<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClassRoomRequest;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\School;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassRoomController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('class_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classRooms = ClassRoom::with(['schools'])->get();

        return view('frontend.classRooms.index', compact('classRooms'));
    }

    public function create()
    {
        abort_if(Gate::denies('class_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schools = School::all()->pluck('school', 'id');

        return view('frontend.classRooms.create', compact('schools'));
    }

    public function store(StoreClassRoomRequest $request)
    {
        $classRoom = ClassRoom::create($request->all());
        $classRoom->schools()->sync($request->input('schools', []));

        return redirect()->route('frontend.class-rooms.index');
    }

    public function edit(ClassRoom $classRoom)
    {
        abort_if(Gate::denies('class_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schools = School::all()->pluck('school', 'id');

        $classRoom->load('schools');

        return view('frontend.classRooms.edit', compact('schools', 'classRoom'));
    }

    public function update(UpdateClassRoomRequest $request, ClassRoom $classRoom)
    {
        $classRoom->update($request->all());
        $classRoom->schools()->sync($request->input('schools', []));

        return redirect()->route('frontend.class-rooms.index');
    }

    public function show(ClassRoom $classRoom)
    {
        abort_if(Gate::denies('class_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classRoom->load('schools', 'classroomStudents', 'classroomSubjects');

        return view('frontend.classRooms.show', compact('classRoom'));
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
