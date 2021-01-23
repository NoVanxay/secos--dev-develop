@extends('layouts.admin')
@section('content')
@can('history_admin_teacher_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.history-admin-teachers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.historyAdminTeacher.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'HistoryAdminTeacher', 'route' => 'admin.history-admin-teachers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.historyAdminTeacher.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HistoryAdminTeacher">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.fist_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.eng_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.eng_last') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.text') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.tribes') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.religion') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.pabbajja') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.identification_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.province_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.district_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.village_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.current_province') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.current_district') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.current_village') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.temple') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.phone_no_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.phone_no_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.office_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.census') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.allow_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.historyAdminTeacher.fields.live_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historyAdminTeachers as $key => $historyAdminTeacher)
                        <tr data-entry-id="{{ $historyAdminTeacher->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $historyAdminTeacher->id ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->title ?? '' }}
                            </td>
                            <td>
                                @if($historyAdminTeacher->photo)
                                    <a href="{{ $historyAdminTeacher->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $historyAdminTeacher->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $historyAdminTeacher->fist_name ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->last_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Constant\app::GENDER_RADIO[$historyAdminTeacher->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->eng_name ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->eng_last ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->text ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->tribes ?? '' }}
                            </td>
                            <td>
                                {{ App\Constant\app::RELIGION_SELECT[$historyAdminTeacher->religion] ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->pabbajja ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->identification_card ?? '' }}
                            </td>
                            <td>
                                {{ App\Constant\app::PROVINCE_SELECT[$historyAdminTeacher->province_birth] ?? '' }}
                            </td>
                            <td>
                                {{ App\Constant\app::DISTRICT_SELECT[$historyAdminTeacher->district_birth] ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->village_birth ?? '' }}
                            </td>
                            <td>
                                {{ App\Constant\app::PROVINCE_SELECT[$historyAdminTeacher->current_province] ?? '' }}
                            </td>
                            <td>
                                {{ App\Constant\app::DISTRICT_SELECT[$historyAdminTeacher->current_district] ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->current_village ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->temple ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->phone_no_1 ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->phone_no_2 ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->office_phone ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->census ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->allow_date ?? '' }}
                            </td>
                            <td>
                                {{ $historyAdminTeacher->live_at ?? '' }}
                            </td>
                            <td>
                                @can('history_admin_teacher_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.history-admin-teachers.show', $historyAdminTeacher->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('history_admin_teacher_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.history-admin-teachers.edit', $historyAdminTeacher->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('history_admin_teacher_delete')
                                    <form action="{{ route('admin.history-admin-teachers.destroy', $historyAdminTeacher->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('history_admin_teacher_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.history-admin-teachers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-HistoryAdminTeacher:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
