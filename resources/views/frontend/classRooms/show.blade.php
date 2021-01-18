@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.classRoom.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.class-rooms.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.class-rooms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
