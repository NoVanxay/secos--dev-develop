@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.historyAdminTeacher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.history-admin-teachers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.historyAdminTeacher.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.historyAdminTeacher.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fist_name">{{ trans('cruds.historyAdminTeacher.fields.fist_name') }}</label>
                <input class="form-control {{ $errors->has('fist_name') ? 'is-invalid' : '' }}" type="text" name="fist_name" id="fist_name" value="{{ old('fist_name', '') }}" required>
                @if($errors->has('fist_name'))
                    <span class="text-danger">{{ $errors->first('fist_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.fist_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.historyAdminTeacher.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.historyAdminTeacher.fields.gender') }}</label>
                @foreach(App\Constant\app::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="eng_name">{{ trans('cruds.historyAdminTeacher.fields.eng_name') }}</label>
                <input class="form-control {{ $errors->has('eng_name') ? 'is-invalid' : '' }}" type="text" name="eng_name" id="eng_name" value="{{ old('eng_name', '') }}" required>
                @if($errors->has('eng_name'))
                    <span class="text-danger">{{ $errors->first('eng_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.eng_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="eng_last">{{ trans('cruds.historyAdminTeacher.fields.eng_last') }}</label>
                <input class="form-control {{ $errors->has('eng_last') ? 'is-invalid' : '' }}" type="text" name="eng_last" id="eng_last" value="{{ old('eng_last', '') }}" required>
                @if($errors->has('eng_last'))
                    <span class="text-danger">{{ $errors->first('eng_last') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.eng_last_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_birth">{{ trans('cruds.historyAdminTeacher.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @if($errors->has('date_of_birth'))
                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text">{{ trans('cruds.historyAdminTeacher.fields.text') }}</label>
                <input class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" type="text" name="text" id="text" value="{{ old('text', '') }}" required>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tribes">{{ trans('cruds.historyAdminTeacher.fields.tribes') }}</label>
                <input class="form-control {{ $errors->has('tribes') ? 'is-invalid' : '' }}" type="text" name="tribes" id="tribes" value="{{ old('tribes', '') }}" required>
                @if($errors->has('tribes'))
                    <span class="text-danger">{{ $errors->first('tribes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.tribes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.historyAdminTeacher.fields.religion') }}</label>
                <select class="form-control {{ $errors->has('religion') ? 'is-invalid' : '' }}" name="religion" id="religion" required>
                    <option value disabled {{ old('religion', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::RELIGION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('religion', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('religion'))
                    <span class="text-danger">{{ $errors->first('religion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.religion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pabbajja">{{ trans('cruds.historyAdminTeacher.fields.pabbajja') }}</label>
                <input class="form-control date {{ $errors->has('pabbajja') ? 'is-invalid' : '' }}" type="text" name="pabbajja" id="pabbajja" value="{{ old('pabbajja') }}" required>
                @if($errors->has('pabbajja'))
                    <span class="text-danger">{{ $errors->first('pabbajja') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.pabbajja_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identification_card">{{ trans('cruds.historyAdminTeacher.fields.identification_card') }}</label>
                <input class="form-control {{ $errors->has('identification_card') ? 'is-invalid' : '' }}" type="text" name="identification_card" id="identification_card" value="{{ old('identification_card', '') }}" required>
                @if($errors->has('identification_card'))
                    <span class="text-danger">{{ $errors->first('identification_card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.identification_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.historyAdminTeacher.fields.province_birth') }}</label>
                <select class="form-control {{ $errors->has('province_birth') ? 'is-invalid' : '' }}" name="province_birth" id="province_birth" required>
                    <option value disabled {{ old('province_birth', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province_birth', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province_birth'))
                    <span class="text-danger">{{ $errors->first('province_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.province_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.historyAdminTeacher.fields.district_birth') }}</label>
                <select class="form-control {{ $errors->has('district_birth') ? 'is-invalid' : '' }}" name="district_birth" id="district_birth" required>
                    <option value disabled {{ old('district_birth', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::DISTRICT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('district_birth', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('district_birth'))
                    <span class="text-danger">{{ $errors->first('district_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.district_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="village_birth">{{ trans('cruds.historyAdminTeacher.fields.village_birth') }}</label>
                <input class="form-control {{ $errors->has('village_birth') ? 'is-invalid' : '' }}" type="text" name="village_birth" id="village_birth" value="{{ old('village_birth', '') }}" required>
                @if($errors->has('village_birth'))
                    <span class="text-danger">{{ $errors->first('village_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.village_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.historyAdminTeacher.fields.current_province') }}</label>
                <select class="form-control {{ $errors->has('current_province') ? 'is-invalid' : '' }}" name="current_province" id="current_province" required>
                    <option value disabled {{ old('current_province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('current_province', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('current_province'))
                    <span class="text-danger">{{ $errors->first('current_province') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.current_province_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.historyAdminTeacher.fields.current_district') }}</label>
                <select class="form-control {{ $errors->has('current_district') ? 'is-invalid' : '' }}" name="current_district" id="current_district" required>
                    <option value disabled {{ old('current_district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Constant\app::DISTRICT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('current_district', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('current_district'))
                    <span class="text-danger">{{ $errors->first('current_district') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.current_district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_village">{{ trans('cruds.historyAdminTeacher.fields.current_village') }}</label>
                <input class="form-control {{ $errors->has('current_village') ? 'is-invalid' : '' }}" type="text" name="current_village" id="current_village" value="{{ old('current_village', '') }}" required>
                @if($errors->has('current_village'))
                    <span class="text-danger">{{ $errors->first('current_village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.current_village_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="temple">{{ trans('cruds.historyAdminTeacher.fields.temple') }}</label>
                <input class="form-control {{ $errors->has('temple') ? 'is-invalid' : '' }}" type="text" name="temple" id="temple" value="{{ old('temple', '') }}" required>
                @if($errors->has('temple'))
                    <span class="text-danger">{{ $errors->first('temple') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.temple_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_no_1">{{ trans('cruds.historyAdminTeacher.fields.phone_no_1') }}</label>
                <input class="form-control {{ $errors->has('phone_no_1') ? 'is-invalid' : '' }}" type="number" name="phone_no_1" id="phone_no_1" value="{{ old('phone_no_1', '') }}" step="1" required>
                @if($errors->has('phone_no_1'))
                    <span class="text-danger">{{ $errors->first('phone_no_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.phone_no_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_no_2">{{ trans('cruds.historyAdminTeacher.fields.phone_no_2') }}</label>
                <input class="form-control {{ $errors->has('phone_no_2') ? 'is-invalid' : '' }}" type="number" name="phone_no_2" id="phone_no_2" value="{{ old('phone_no_2', '') }}" step="1">
                @if($errors->has('phone_no_2'))
                    <span class="text-danger">{{ $errors->first('phone_no_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.phone_no_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_phone">{{ trans('cruds.historyAdminTeacher.fields.office_phone') }}</label>
                <input class="form-control {{ $errors->has('office_phone') ? 'is-invalid' : '' }}" type="number" name="office_phone" id="office_phone" value="{{ old('office_phone', '') }}" step="1">
                @if($errors->has('office_phone'))
                    <span class="text-danger">{{ $errors->first('office_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.office_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="census">{{ trans('cruds.historyAdminTeacher.fields.census') }}</label>
                <input class="form-control {{ $errors->has('census') ? 'is-invalid' : '' }}" type="text" name="census" id="census" value="{{ old('census', '') }}" required>
                @if($errors->has('census'))
                    <span class="text-danger">{{ $errors->first('census') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.census_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="allow_date">{{ trans('cruds.historyAdminTeacher.fields.allow_date') }}</label>
                <input class="form-control date {{ $errors->has('allow_date') ? 'is-invalid' : '' }}" type="text" name="allow_date" id="allow_date" value="{{ old('allow_date') }}">
                @if($errors->has('allow_date'))
                    <span class="text-danger">{{ $errors->first('allow_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.allow_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="live_at">{{ trans('cruds.historyAdminTeacher.fields.live_at') }}</label>
                <input class="form-control {{ $errors->has('live_at') ? 'is-invalid' : '' }}" type="text" name="live_at" id="live_at" value="{{ old('live_at', '') }}" required>
                @if($errors->has('live_at'))
                    <span class="text-danger">{{ $errors->first('live_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.live_at_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.history-admin-teachers.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 288,
      height: 384
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($historyAdminTeacher) && $historyAdminTeacher->photo)
      var file = {!! json_encode($historyAdminTeacher->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
