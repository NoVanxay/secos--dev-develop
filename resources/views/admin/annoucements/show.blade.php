@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.annoucement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.annoucements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.id') }}
                        </th>
                        <td>
                            {{ $annoucement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.annoucement') }}
                        </th>
                        <td>
                            @if($annoucement->annoucement)
                                <a href="{{ $annoucement->annoucement->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.name') }}
                        </th>
                        <td>
                            {{ $annoucement->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.number') }}
                        </th>
                        <td>
                            {{ $annoucement->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.short_name') }}
                        </th>
                        <td>
                            {{ $annoucement->short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.allow_date') }}
                        </th>
                        <td>
                            {{ $annoucement->allow_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.annoucement.fields.description') }}
                        </th>
                        <td>
                            {!! $annoucement->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.annoucements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
