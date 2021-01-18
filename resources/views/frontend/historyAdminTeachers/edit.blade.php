@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.historyAdminTeacher.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.history-admin-teachers.update", [$historyAdminTeacher->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.historyAdminTeacher.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $historyAdminTeacher->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="photo">{{ trans('cruds.historyAdminTeacher.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fist_name">{{ trans('cruds.historyAdminTeacher.fields.fist_name') }}</label>
                            <input class="form-control" type="text" name="fist_name" id="fist_name" value="{{ old('fist_name', $historyAdminTeacher->fist_name) }}" required>
                            @if($errors->has('fist_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fist_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.fist_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.historyAdminTeacher.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $historyAdminTeacher->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.historyAdminTeacher.fields.gender') }}</label>
                            @foreach(App\Models\HistoryAdminTeacher::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $historyAdminTeacher->gender) === (string) $key ? 'checked' : '' }} required>
                                    <label for="gender_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="eng_name">{{ trans('cruds.historyAdminTeacher.fields.eng_name') }}</label>
                            <input class="form-control" type="text" name="eng_name" id="eng_name" value="{{ old('eng_name', $historyAdminTeacher->eng_name) }}" required>
                            @if($errors->has('eng_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eng_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.eng_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="eng_last">{{ trans('cruds.historyAdminTeacher.fields.eng_last') }}</label>
                            <input class="form-control" type="text" name="eng_last" id="eng_last" value="{{ old('eng_last', $historyAdminTeacher->eng_last) }}" required>
                            @if($errors->has('eng_last'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eng_last') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.eng_last_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date_of_birth">{{ trans('cruds.historyAdminTeacher.fields.date_of_birth') }}</label>
                            <input class="form-control date" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $historyAdminTeacher->date_of_birth) }}" required>
                            @if($errors->has('date_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.date_of_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="text">{{ trans('cruds.historyAdminTeacher.fields.text') }}</label>
                            <input class="form-control" type="text" name="text" id="text" value="{{ old('text', $historyAdminTeacher->text) }}" required>
                            @if($errors->has('text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tribes">{{ trans('cruds.historyAdminTeacher.fields.tribes') }}</label>
                            <input class="form-control" type="text" name="tribes" id="tribes" value="{{ old('tribes', $historyAdminTeacher->tribes) }}" required>
                            @if($errors->has('tribes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tribes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.tribes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.historyAdminTeacher.fields.religion') }}</label>
                            <select class="form-control" name="religion" id="religion" required>
                                <option value disabled {{ old('religion', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HistoryAdminTeacher::RELIGION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('religion', $historyAdminTeacher->religion) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('religion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('religion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.religion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="pabbajja">{{ trans('cruds.historyAdminTeacher.fields.pabbajja') }}</label>
                            <input class="form-control date" type="text" name="pabbajja" id="pabbajja" value="{{ old('pabbajja', $historyAdminTeacher->pabbajja) }}" required>
                            @if($errors->has('pabbajja'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pabbajja') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.pabbajja_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="identification_card">{{ trans('cruds.historyAdminTeacher.fields.identification_card') }}</label>
                            <input class="form-control" type="text" name="identification_card" id="identification_card" value="{{ old('identification_card', $historyAdminTeacher->identification_card) }}" required>
                            @if($errors->has('identification_card'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('identification_card') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.identification_card_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.historyAdminTeacher.fields.province_birth') }}</label>
                            <select class="form-control" name="province_birth" id="province_birth" required>
                                <option value disabled {{ old('province_birth', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HistoryAdminTeacher::PROVINCE_BIRTH_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('province_birth', $historyAdminTeacher->province_birth) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('province_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('province_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.province_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="district_birth">{{ trans('cruds.historyAdminTeacher.fields.district_birth') }}</label>
                            <input class="form-control" type="text" name="district_birth" id="district_birth" value="{{ old('district_birth', $historyAdminTeacher->district_birth) }}" required>
                            @if($errors->has('district_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('district_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.district_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="village_birth">{{ trans('cruds.historyAdminTeacher.fields.village_birth') }}</label>
                            <input class="form-control" type="text" name="village_birth" id="village_birth" value="{{ old('village_birth', $historyAdminTeacher->village_birth) }}" required>
                            @if($errors->has('village_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('village_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.village_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.historyAdminTeacher.fields.current_province') }}</label>
                            <select class="form-control" name="current_province" id="current_province" required>
                                <option value disabled {{ old('current_province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HistoryAdminTeacher::CURRENT_PROVINCE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('current_province', $historyAdminTeacher->current_province) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('current_province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.current_province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="current_district">{{ trans('cruds.historyAdminTeacher.fields.current_district') }}</label>
                            <input class="form-control" type="text" name="current_district" id="current_district" value="{{ old('current_district', $historyAdminTeacher->current_district) }}" required>
                            @if($errors->has('current_district'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_district') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.current_district_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="current_village">{{ trans('cruds.historyAdminTeacher.fields.current_village') }}</label>
                            <input class="form-control" type="text" name="current_village" id="current_village" value="{{ old('current_village', $historyAdminTeacher->current_village) }}" required>
                            @if($errors->has('current_village'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_village') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.current_village_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="temple">{{ trans('cruds.historyAdminTeacher.fields.temple') }}</label>
                            <input class="form-control" type="text" name="temple" id="temple" value="{{ old('temple', $historyAdminTeacher->temple) }}" required>
                            @if($errors->has('temple'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('temple') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.temple_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone_no_1">{{ trans('cruds.historyAdminTeacher.fields.phone_no_1') }}</label>
                            <input class="form-control" type="number" name="phone_no_1" id="phone_no_1" value="{{ old('phone_no_1', $historyAdminTeacher->phone_no_1) }}" step="1" required>
                            @if($errors->has('phone_no_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_no_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.phone_no_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_no_2">{{ trans('cruds.historyAdminTeacher.fields.phone_no_2') }}</label>
                            <input class="form-control" type="number" name="phone_no_2" id="phone_no_2" value="{{ old('phone_no_2', $historyAdminTeacher->phone_no_2) }}" step="1">
                            @if($errors->has('phone_no_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_no_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.phone_no_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="office_phone">{{ trans('cruds.historyAdminTeacher.fields.office_phone') }}</label>
                            <input class="form-control" type="number" name="office_phone" id="office_phone" value="{{ old('office_phone', $historyAdminTeacher->office_phone) }}" step="1">
                            @if($errors->has('office_phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('office_phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.office_phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="census">{{ trans('cruds.historyAdminTeacher.fields.census') }}</label>
                            <input class="form-control" type="text" name="census" id="census" value="{{ old('census', $historyAdminTeacher->census) }}" required>
                            @if($errors->has('census'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('census') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.census_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="allow_date">{{ trans('cruds.historyAdminTeacher.fields.allow_date') }}</label>
                            <input class="form-control date" type="text" name="allow_date" id="allow_date" value="{{ old('allow_date', $historyAdminTeacher->allow_date) }}">
                            @if($errors->has('allow_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allow_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.historyAdminTeacher.fields.allow_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="live_at">{{ trans('cruds.historyAdminTeacher.fields.live_at') }}</label>
                            <input class="form-control" type="text" name="live_at" id="live_at" value="{{ old('live_at', $historyAdminTeacher->live_at) }}" required>
                            @if($errors->has('live_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('live_at') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('frontend.history-admin-teachers.storeMedia') }}',
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
