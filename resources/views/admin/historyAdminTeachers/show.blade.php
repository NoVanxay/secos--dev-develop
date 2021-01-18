@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.historyAdminTeacher.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.history-admin-teachers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.id') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.title') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.photo') }}
                        </th>
                        <td>
                            @if($historyAdminTeacher->photo)
                                <a href="{{ $historyAdminTeacher->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $historyAdminTeacher->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.fist_name') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->fist_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.last_name') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\HistoryAdminTeacher::GENDER_RADIO[$historyAdminTeacher->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.eng_name') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->eng_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.eng_last') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->eng_last }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.text') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.tribes') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->tribes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.religion') }}
                        </th>
                        <td>
                            {{ App\Models\HistoryAdminTeacher::RELIGION_SELECT[$historyAdminTeacher->religion] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.pabbajja') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->pabbajja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.identification_card') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->identification_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.province_birth') }}
                        </th>
                        <td>
                            {{ App\Models\HistoryAdminTeacher::PROVINCE_BIRTH_SELECT[$historyAdminTeacher->province_birth] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.district_birth') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->district_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.village_birth') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->village_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.current_province') }}
                        </th>
                        <td>
                            {{ App\Models\HistoryAdminTeacher::CURRENT_PROVINCE_SELECT[$historyAdminTeacher->current_province] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.current_district') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->current_district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.current_village') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->current_village }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.temple') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->temple }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.phone_no_1') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->phone_no_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.phone_no_2') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->phone_no_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.office_phone') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->office_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.census') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->census }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.allow_date') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->allow_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.live_at') }}
                        </th>
                        <td>
                            {{ $historyAdminTeacher->live_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.history-admin-teachers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
