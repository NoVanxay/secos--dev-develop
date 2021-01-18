@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.student.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.students.update", [$student->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="st_code">{{ trans('cruds.student.fields.st_code') }}</label>
                            <input class="form-control" type="text" name="st_code" id="st_code" value="{{ old('st_code', $student->st_code) }}" required>
                            @if($errors->has('st_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('st_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.st_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.student.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $student->first_name) }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.student.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $student->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.student.fields.gender') }}</label>
                            @foreach(App\Models\Student::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $student->gender) === (string) $key ? 'checked' : '' }} required>
                                    <label for="gender_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date_of_birth">{{ trans('cruds.student.fields.date_of_birth') }}</label>
                            <input class="form-control date" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
                            @if($errors->has('date_of_birth'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_of_birth') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.date_of_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="village">{{ trans('cruds.student.fields.village') }}</label>
                            <input class="form-control" type="text" name="village" id="village" value="{{ old('village', $student->village) }}" required>
                            @if($errors->has('village'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('village') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.village_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="district">{{ trans('cruds.student.fields.district') }}</label>
                            <input class="form-control" type="text" name="district" id="district" value="{{ old('district', $student->district) }}" required>
                            @if($errors->has('district'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('district') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.district_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.student.fields.province') }}</label>
                            <select class="form-control" name="province" id="province" required>
                                <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Student::PROVINCE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('province', $student->province) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('province'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('province') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.province_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="father_name">{{ trans('cruds.student.fields.father_name') }}</label>
                            <input class="form-control" type="text" name="father_name" id="father_name" value="{{ old('father_name', $student->father_name) }}" required>
                            @if($errors->has('father_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('father_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.father_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="father_no">{{ trans('cruds.student.fields.father_no') }}</label>
                            <input class="form-control" type="number" name="father_no" id="father_no" value="{{ old('father_no', $student->father_no) }}" step="1">
                            @if($errors->has('father_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('father_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.father_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mother_name">{{ trans('cruds.student.fields.mother_name') }}</label>
                            <input class="form-control" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', $student->mother_name) }}" required>
                            @if($errors->has('mother_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mother_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.mother_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mother_no">{{ trans('cruds.student.fields.mother_no') }}</label>
                            <input class="form-control" type="number" name="mother_no" id="mother_no" value="{{ old('mother_no', $student->mother_no) }}" step="1">
                            @if($errors->has('mother_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mother_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.mother_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="classroom_id">{{ trans('cruds.student.fields.classroom') }}</label>
                            <select class="form-control select2" name="classroom_id" id="classroom_id" required>
                                @foreach($classrooms as $id => $classroom)
                                    <option value="{{ $id }}" {{ (old('classroom_id') ? old('classroom_id') : $student->classroom->id ?? '') == $id ? 'selected' : '' }}>{{ $classroom }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('classroom'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('classroom') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.classroom_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="school_id">{{ trans('cruds.student.fields.school') }}</label>
                            <select class="form-control select2" name="school_id" id="school_id" required>
                                @foreach($schools as $id => $school)
                                    <option value="{{ $id }}" {{ (old('school_id') ? old('school_id') : $student->school->id ?? '') == $id ? 'selected' : '' }}>{{ $school }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('school'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('school') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.school_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="end_from">{{ trans('cruds.student.fields.end_from') }}</label>
                            <input class="form-control" type="text" name="end_from" id="end_from" value="{{ old('end_from', $student->end_from) }}" required>
                            @if($errors->has('end_from'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_from') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.end_from_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="academic_years_id">{{ trans('cruds.student.fields.academic_years') }}</label>
                            <select class="form-control select2" name="academic_years_id" id="academic_years_id" required>
                                @foreach($academic_years as $id => $academic_years)
                                    <option value="{{ $id }}" {{ (old('academic_years_id') ? old('academic_years_id') : $student->academic_years->id ?? '') == $id ? 'selected' : '' }}>{{ $academic_years }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('academic_years'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('academic_years') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.academic_years_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.student.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">{{ trans('cruds.student.fields.phone_no') }}</label>
                            <input class="form-control" type="number" name="phone_no" id="phone_no" value="{{ old('phone_no', $student->phone_no) }}" step="1">
                            @if($errors->has('phone_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.phone_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.student.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', $student->note) }}">
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email_id">{{ trans('cruds.student.fields.email') }}</label>
                            <select class="form-control select2" name="email_id" id="email_id" required>
                                @foreach($emails as $id => $email)
                                    <option value="{{ $id }}" {{ (old('email_id') ? old('email_id') : $student->email->id ?? '') == $id ? 'selected' : '' }}>{{ $email }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="roles_id">{{ trans('cruds.student.fields.roles') }}</label>
                            <select class="form-control select2" name="roles_id" id="roles_id" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (old('roles_id') ? old('roles_id') : $student->roles->id ?? '') == $id ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.student.fields.roles_helper') }}</span>
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
    url: '{{ route('frontend.students.storeMedia') }}',
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
@if(isset($student) && $student->photo)
      var file = {!! json_encode($student->photo) !!}
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
