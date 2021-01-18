@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.school.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.schools.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.school.fields.id') }}
                        </th>
                        <td>
                            {{ $school->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.school.fields.school') }}
                        </th>
                        <td>
                            {{ $school->school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.school.fields.village') }}
                        </th>
                        <td>
                            {{ $school->village }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.school.fields.district') }}
                        </th>
                        <td>
                            {{ $school->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.school.fields.province') }}
                        </th>
                        <td>
                            {{ App\Models\School::PROVINCE_SELECT[$school->province] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.schools.index') }}">
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
            <a class="nav-link" href="#school_students" role="tab" data-toggle="tab">
                {{ trans('cruds.student.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#school_class_rooms" role="tab" data-toggle="tab">
                {{ trans('cruds.classRoom.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="school_students">
            @includeIf('admin.schools.relationships.schoolStudents', ['students' => $school->schoolStudents])
        </div>
        <div class="tab-pane" role="tabpanel" id="school_class_rooms">
            @includeIf('admin.schools.relationships.schoolClassRooms', ['classRooms' => $school->schoolClassRooms])
        </div>
    </div>
</div>

@endsection
