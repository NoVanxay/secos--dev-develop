<div class="m-3">
    @can('student_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.students.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-emailStudents">
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
                                {{ trans('cruds.student.fields.academic_years') }}
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
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.student.fields.roles') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $key => $student)
                            <tr data-entry-id="{{ $student->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $student->id ?? '' }}
                                </td>
                                <td>
                                    {{ $student->st_code ?? '' }}
                                </td>
                                <td>
                                    {{ $student->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $student->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Student::GENDER_RADIO[$student->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ $student->date_of_birth ?? '' }}
                                </td>
                                <td>
                                    {{ $student->village ?? '' }}
                                </td>
                                <td>
                                    {{ $student->district ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Student::PROVINCE_SELECT[$student->province] ?? '' }}
                                </td>
                                <td>
                                    {{ $student->father_name ?? '' }}
                                </td>
                                <td>
                                    {{ $student->father_no ?? '' }}
                                </td>
                                <td>
                                    {{ $student->mother_name ?? '' }}
                                </td>
                                <td>
                                    {{ $student->mother_no ?? '' }}
                                </td>
                                <td>
                                    {{ $student->classroom->class_room ?? '' }}
                                </td>
                                <td>
                                    {{ $student->school->school ?? '' }}
                                </td>
                                <td>
                                    {{ $student->end_from ?? '' }}
                                </td>
                                <td>
                                    {{ $student->academic_years->title ?? '' }}
                                </td>
                                <td>
                                    @if($student->photo)
                                        <a href="{{ $student->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $student->photo->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $student->phone_no ?? '' }}
                                </td>
                                <td>
                                    {{ $student->note ?? '' }}
                                </td>
                                <td>
                                    {{ $student->email->email ?? '' }}
                                </td>
                                <td>
                                    {{ $student->email->email ?? '' }}
                                </td>
                                <td>
                                    {{ $student->roles->title ?? '' }}
                                </td>
                                <td>
                                    @can('student_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.students.show', $student->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('student_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.students.edit', $student->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('student_delete')
                                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.students.massDestroy') }}",
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
  let table = $('.datatable-emailStudents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
