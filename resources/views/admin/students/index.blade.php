@extends('layouts.admin')
@section('content')
@can('student_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.students.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Student', 'route' => 'admin.students.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Student">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.student.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.st_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.gender') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.date_of_birth') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.village') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.district') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.province') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.father_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.father_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.mother_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.mother_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.classroom') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.school') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.end_from') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.phone_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.note') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.student.fields.roles') }}
                    </th>
                    <th>
                        &nbsp;&nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.students.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.students.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'st_code', name: 'st_code' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'gender', name: 'gender' },
{ data: 'date_of_birth', name: 'date_of_birth' },
{ data: 'village', name: 'village' },
{ data: 'district', name: 'district' },
{ data: 'province', name: 'province' },
{ data: 'father_name', name: 'father_name' },
{ data: 'father_no', name: 'father_no' },
{ data: 'mother_name', name: 'mother_name' },
{ data: 'mother_no', name: 'mother_no' },
{ data: 'classroom_class_room', name: 'classroom.class_room' },
{ data: 'school_school', name: 'school.school' },
{ data: 'end_from', name: 'end_from' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'phone_no', name: 'phone_no' },
{ data: 'note', name: 'note' },
{ data: 'email', name: 'email' },
{ data: 'roles_title', name: 'roles.title' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Student').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
