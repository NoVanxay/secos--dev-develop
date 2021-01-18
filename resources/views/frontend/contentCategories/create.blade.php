@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.contentCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.content-categories.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="content_category">{{ trans('cruds.contentCategory.fields.content_category') }}</label>
                            <input class="form-control" type="text" name="content_category" id="content_category" value="{{ old('content_category', '') }}" required>
                            @if($errors->has('content_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content_category') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection
