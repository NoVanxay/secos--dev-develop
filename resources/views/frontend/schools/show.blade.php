@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.school.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.schools.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.school.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $school->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.school.fields.school') }}
                                    </th>
                                    <td>
                                        {{ $school->school }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.school.fields.village') }}
                                    </th>
                                    <td>
                                        {{ $school->village }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.school.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $school->district }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.school.fields.province') }}
                                    </th>
                                    <td>
                                        {{ App\Models\School::PROVINCE_SELECT[$school->province] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.schools.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
