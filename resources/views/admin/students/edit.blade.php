@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.update", [$student->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="st_code">{{ trans('cruds.student.fields.st_code') }}</label>
                <input class="form-control {{ $errors->has('st_code') ? 'is-invalid' : '' }}" type="text" name="st_code" id="st_code" value="{{ old('st_code', $student->st_code) }}" required>
                @if($errors->has('st_code'))
                    <span class="text-danger">{{ $errors->first('st_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.st_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.student.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $student->first_name) }}" required>
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.student.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $student->last_name) }}" required>
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.student.fields.gender') }}</label>
                @foreach(App\Models\Student::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $student->gender) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_birth">{{ trans('cruds.student.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
                @if($errors->has('date_of_birth'))
                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="village">{{ trans('cruds.student.fields.village') }}</label>
                <input class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" type="text" name="village" id="village" value="{{ old('village', $student->village) }}" required>
                @if($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.village_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district">{{ trans('cruds.student.fields.district') }}</label>
                <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', $student->district) }}" required>
                @if($errors->has('district'))
                    <span class="text-danger">{{ $errors->first('district') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.student.fields.province') }}</label>
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province" required>
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Student::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province', $student->province) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <span class="text-danger">{{ $errors->first('province') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_name">{{ trans('cruds.student.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', $student->father_name) }}" required>
                @if($errors->has('father_name'))
                    <span class="text-danger">{{ $errors->first('father_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father_no">{{ trans('cruds.student.fields.father_no') }}</label>
                <input class="form-control {{ $errors->has('father_no') ? 'is-invalid' : '' }}" type="number" name="father_no" id="father_no" value="{{ old('father_no', $student->father_no) }}" step="1">
                @if($errors->has('father_no'))
                    <span class="text-danger">{{ $errors->first('father_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.father_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother_name">{{ trans('cruds.student.fields.mother_name') }}</label>
                <input class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', $student->mother_name) }}" required>
                @if($errors->has('mother_name'))
                    <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mother_no">{{ trans('cruds.student.fields.mother_no') }}</label>
                <input class="form-control {{ $errors->has('mother_no') ? 'is-invalid' : '' }}" type="number" name="mother_no" id="mother_no" value="{{ old('mother_no', $student->mother_no) }}" step="1">
                @if($errors->has('mother_no'))
                    <span class="text-danger">{{ $errors->first('mother_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.mother_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="classroom_id">{{ trans('cruds.student.fields.classroom') }}</label>
                <select class="form-control select2 {{ $errors->has('classroom') ? 'is-invalid' : '' }}" name="classroom_id" id="classroom_id" required>
                    @foreach($classrooms as $id => $classroom)
                        <option value="{{ $id }}" {{ (old('classroom_id') ? old('classroom_id') : $student->classroom->id ?? '') == $id ? 'selected' : '' }}>{{ $classroom }}</option>
                    @endforeach
                </select>
                @if($errors->has('classroom'))
                    <span class="text-danger">{{ $errors->first('classroom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.classroom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="school_id">{{ trans('cruds.student.fields.school') }}</label>
                <select class="form-control select2 {{ $errors->has('school') ? 'is-invalid' : '' }}" name="school_id" id="school_id" required>
                    @foreach($schools as $id => $school)
                        <option value="{{ $id }}" {{ (old('school_id') ? old('school_id') : $student->school->id ?? '') == $id ? 'selected' : '' }}>{{ $school }}</option>
                    @endforeach
                </select>
                @if($errors->has('school'))
                    <span class="text-danger">{{ $errors->first('school') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.school_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_from">{{ trans('cruds.student.fields.end_from') }}</label>
                <input class="form-control {{ $errors->has('end_from') ? 'is-invalid' : '' }}" type="text" name="end_from" id="end_from" value="{{ old('end_from', $student->end_from) }}" required>
                @if($errors->has('end_from'))
                    <span class="text-danger">{{ $errors->first('end_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.end_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.student.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_no">{{ trans('cruds.student.fields.phone_no') }}</label>
                <input class="form-control {{ $errors->has('phone_no') ? 'is-invalid' : '' }}" type="number" name="phone_no" id="phone_no" value="{{ old('phone_no', $student->phone_no) }}" step="1">
                @if($errors->has('phone_no'))
                    <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.phone_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.student.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', $student->note) }}">
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.student.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $student->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles_id">{{ trans('cruds.student.fields.roles') }}</label>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles_id" id="roles_id" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (old('roles_id') ? old('roles_id') : $student->roles->id ?? '') == $id ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
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



@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.students.storeMedia') }}',
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
