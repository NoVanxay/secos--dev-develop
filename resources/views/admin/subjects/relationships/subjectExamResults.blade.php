<div class="m-3">
    @can('exam_result_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.exam-results.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.examResult.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.examResult.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-subjectExamResults">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.table_code') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.last_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.subject') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.exam_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.academic_years') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.classroom') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.school') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.point') }}
                            </th>
                            <th>
                                {{ trans('cruds.examResult.fields.note') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($examResults as $key => $examResult)
                            <tr data-entry-id="{{ $examResult->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $examResult->id ?? '' }}
                                </td>
                                <td>
                                    {{ $examResult->title ?? '' }}
                                </td>
                                <td>
                                    {{ $examResult->table_code ?? '' }}
                                </td>
                                <td>
                                    @foreach($examResult->names as $key => $item)
                                        <span class="badge badge-info">{{ $item->first_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $examResult->last_name->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $examResult->gender->gender ?? '' }}
                                </td>
                                <td>
                                    @foreach($examResult->subjects as $key => $item)
                                        <span class="badge badge-info">{{ $item->subject }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $examResult->exam_date ?? '' }}
                                </td>
                                <td>
                                    @foreach($examResult->academic_years as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $examResult->classroom->class_room ?? '' }}
                                </td>
                                <td>
                                    {{ $examResult->school->school ?? '' }}
                                </td>
                                <td>
                                    {{ $examResult->point ?? '' }}
                                </td>
                                <td>
                                    {{ $examResult->note ?? '' }}
                                </td>
                                <td>
                                    @can('exam_result_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.exam-results.show', $examResult->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('exam_result_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.exam-results.edit', $examResult->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('exam_result_delete')
                                        <form action="{{ route('admin.exam-results.destroy', $examResult->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('exam_result_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exam-results.massDestroy') }}",
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
  let table = $('.datatable-subjectExamResults:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
