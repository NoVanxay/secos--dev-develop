@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.subject.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.subjects.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="subject_code">{{ trans('cruds.subject.fields.subject_code') }}</label>
                            <input class="form-control" type="text" name="subject_code" id="subject_code" value="{{ old('subject_code', '') }}">
                            @if($errors->has('subject_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.subject.fields.subject_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="subject">{{ trans('cruds.subject.fields.subject') }}</label>
                            <input class="form-control" type="text" name="subject" id="subject" value="{{ old('subject', '') }}" required>
                            @if($errors->has('subject'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.subject.fields.subject_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="classrooms">{{ trans('cruds.subject.fields.classroom') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="classrooms[]" id="classrooms" multiple required>
                                @foreach($classrooms as $id => $classroom)
                                    <option value="{{ $id }}" {{ in_array($id, old('classrooms', [])) ? 'selected' : '' }}>{{ $classroom }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('classrooms'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('classrooms') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection
