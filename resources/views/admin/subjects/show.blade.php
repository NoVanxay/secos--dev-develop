@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.id') }}
                        </th>
                        <td>
                            {{ $subject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.subject_code') }}
                        </th>
                        <td>
                            {{ $subject->subject_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.subject') }}
                        </th>
                        <td>
                            {{ $subject->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.classroom') }}
                        </th>
                        <td>
                            @foreach($subject->classrooms as $key => $classroom)
                                <span class="label label-info">{{ $classroom->class_room }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
