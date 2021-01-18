@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('annoucement_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.annoucements.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.annoucement.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.annoucement.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Annoucement">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.annoucement.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.annoucement.fields.annoucement') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.annoucement.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.annoucement.fields.number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.annoucement.fields.short_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.annoucement.fields.allow_date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($annoucements as $key => $annoucement)
                                    <tr data-entry-id="{{ $annoucement->id }}">
                                        <td>
                                            {{ $annoucement->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($annoucement->annoucement)
                                                <a href="{{ $annoucement->annoucement->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $annoucement->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $annoucement->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $annoucement->short_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $annoucement->allow_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('annoucement_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.annoucements.show', $annoucement->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('annoucement_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.annoucements.edit', $annoucement->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('annoucement_delete')
                                                <form action="{{ route('frontend.annoucements.destroy', $annoucement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('annoucement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.annoucements.massDestroy') }}",
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
  let table = $('.datatable-Annoucement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
