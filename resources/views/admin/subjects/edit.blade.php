@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subjects.update", [$subject->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="subject_code">{{ trans('cruds.subject.fields.subject_code') }}</label>
                <input class="form-control {{ $errors->has('subject_code') ? 'is-invalid' : '' }}" type="text" name="subject_code" id="subject_code" value="{{ old('subject_code', $subject->subject_code) }}">
                @if($errors->has('subject_code'))
                    <span class="text-danger">{{ $errors->first('subject_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.subject_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject">{{ trans('cruds.subject.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', $subject->subject) }}" required>
                @if($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="classrooms">{{ trans('cruds.subject.fields.classroom') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('classrooms') ? 'is-invalid' : '' }}" name="classrooms[]" id="classrooms" multiple required>
                    @foreach($classrooms as $id => $classroom)
                        <option value="{{ $id }}" {{ (in_array($id, old('classrooms', [])) || $subject->classrooms->contains($id)) ? 'selected' : '' }}>{{ $classroom }}</option>
                    @endforeach
                </select>
                @if($errors->has('classrooms'))
                    <span class="text-danger">{{ $errors->first('classrooms') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.classroom_helper') }}</span>
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
