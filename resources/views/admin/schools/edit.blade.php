@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.school.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.schools.update", [$school->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="school">{{ trans('cruds.school.fields.school') }}</label>
                <input class="form-control {{ $errors->has('school') ? 'is-invalid' : '' }}" type="text" name="school" id="school" value="{{ old('school', $school->school) }}" required>
                @if($errors->has('school'))
                    <span class="text-danger">{{ $errors->first('school') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.school.fields.school_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="village">{{ trans('cruds.school.fields.village') }}</label>
                <input class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" type="text" name="village" id="village" value="{{ old('village', $school->village) }}" required>
                @if($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.school.fields.village_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.school.fields.district') }}</label>
                <select class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district" id="district">
                    <option value disabled {{ old('district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::DISTRICT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('district', $school->district) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <span class="text-danger">{{ $errors->first('district') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.school.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.school.fields.province') }}</label>
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province">
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province', $school->province) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <span class="text-danger">{{ $errors->first('province') }}</span>
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



@endsection
