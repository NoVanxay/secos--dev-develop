@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.classRoom.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.class-rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.classRoom.fields.id') }}
                        </th>
                        <td>
                            {{ $classRoom->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.classRoom.fields.class_room') }}
                        </th>
                        <td>
                            {{ $classRoom->class_room }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.classRoom.fields.school') }}
                        </th>
                        <td>
                            @foreach($classRoom->schools as $key => $school)
                                <span class="label label-info">{{ $school->school }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.class-rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#classroom_students" role="tab" data-toggle="tab">
                {{ trans('cruds.student.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#classroom_subjects" role="tab" data-toggle="tab">
                {{ trans('cruds.subject.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="classroom_students">
            @includeIf('admin.classRooms.relationships.classroomStudents', ['students' => $classRoom->classroomStudents])
        </div>
        <div class="tab-pane" role="tabpanel" id="classroom_subjects">
            @includeIf('admin.classRooms.relationships.classroomSubjects', ['subjects' => $classRoom->classroomSubjects])
        </div>
    </div>
</div>

@endsection
