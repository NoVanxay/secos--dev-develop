@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.school.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.schools.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="school">{{ trans('cruds.school.fields.school') }}</label>
                            <input class="form-control" type="text" name="school" id="school" value="{{ old('school', '') }}" required>
                            @if($errors->has('school'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('school') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.school.fields.school_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="village">{{ trans('cruds.school.fields.village') }}</label>
                            <input class="form-control" type="text" name="village" id="village" value="{{ old('village', '') }}" required>
                            @if($errors->has('village'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('village') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.school.fields.village_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="district">{{ trans('cruds.school.fields.district') }}</label>
                            <input class="form-control" type="text" name="district" id="district" value="{{ old('district', '') }}" required>
                            @if($errors->has('district'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('district') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.school.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.school.fields.province') }}</label>
                            <select class="form-control" name="province" id="province">
                                <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\School::PROVINCE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('province', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.school.fields.province_helper') }}</span>
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
