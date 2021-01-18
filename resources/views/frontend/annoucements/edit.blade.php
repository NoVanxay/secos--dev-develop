@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.annoucement.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.annoucements.update", [$annoucement->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="annoucement">{{ trans('cruds.annoucement.fields.annoucement') }}</label>
                            <div class="needsclick dropzone" id="annoucement-dropzone">
                            </div>
                            @if($errors->has('annoucement'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('annoucement') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.annoucement.fields.annoucement_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.annoucement.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $annoucement->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.annoucement.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="number">{{ trans('cruds.annoucement.fields.number') }}</label>
                            <input class="form-control" type="number" name="number" id="number" value="{{ old('number', $annoucement->number) }}" step="1" required>
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.annoucement.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="short_name">{{ trans('cruds.annoucement.fields.short_name') }}</label>
                            <input class="form-control" type="text" name="short_name" id="short_name" value="{{ old('short_name', $annoucement->short_name) }}" required>
                            @if($errors->has('short_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.annoucement.fields.short_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="allow_date">{{ trans('cruds.annoucement.fields.allow_date') }}</label>
                            <input class="form-control date" type="text" name="allow_date" id="allow_date" value="{{ old('allow_date', $annoucement->allow_date) }}" required>
                            @if($errors->has('allow_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('allow_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.annoucement.fields.allow_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.annoucement.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $annoucement->description) !!}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.annoucement.fields.description_helper') }}</span>
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
    Dropzone.options.annoucementDropzone = {
    url: '{{ route('frontend.annoucements.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="annoucement"]').remove()
      $('form').append('<input type="hidden" name="annoucement" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="annoucement"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($annoucement) && $annoucement->annoucement)
      var file = {!! json_encode($annoucement->annoucement) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="annoucement" value="' + file.file_name + '">')
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/annoucements/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $annoucement->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
