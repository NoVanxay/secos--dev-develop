@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.classRoom.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.class-rooms.update", [$classRoom->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="class_room">{{ trans('cruds.classRoom.fields.class_room') }}</label>
                <input class="form-control {{ $errors->has('class_room') ? 'is-invalid' : '' }}" type="text" name="class_room" id="class_room" value="{{ old('class_room', $classRoom->class_room) }}" required>
                @if($errors->has('class_room'))
                    <span class="text-danger">{{ $errors->first('class_room') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.classRoom.fields.class_room_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="schools">{{ trans('cruds.classRoom.fields.school') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('schools') ? 'is-invalid' : '' }}" name="schools[]" id="schools" multiple required>
                    @foreach($schools as $id => $school)
                        <option value="{{ $id }}" {{ (in_array($id, old('schools', [])) || $classRoom->schools->contains($id)) ? 'selected' : '' }}>{{ $school }}</option>
                    @endforeach
                </select>
                @if($errors->has('schools'))
                    <span class="text-danger">{{ $errors->first('schools') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.classRoom.fields.school_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
