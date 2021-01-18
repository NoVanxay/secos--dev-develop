@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contentCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.content-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="content_category">{{ trans('cruds.contentCategory.fields.content_category') }}</label>
                <input class="form-control {{ $errors->has('content_category') ? 'is-invalid' : '' }}" type="text" name="content_category" id="content_category" value="{{ old('content_category', '') }}" required>
                @if($errors->has('content_category'))
                    <span class="text-danger">{{ $errors->first('content_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contentCategory.fields.content_category_helper') }}</span>
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
