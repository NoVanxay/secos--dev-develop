@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('policy_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.policies.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.policy.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.policy.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Policy">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.policy.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.policy.fields.policy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.policy.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.policy.fields.lavel_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.policy.fields.allow_date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($policies as $key => $policy)
                                    <tr data-entry-id="{{ $policy->id }}">
                                        <td>
                                            {{ $policy->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($policy->policy)
                                                <a href="{{ $policy->policy->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $policy->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $policy->lavel_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $policy->allow_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('policy_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.policies.show', $policy->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('policy_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.policies.edit', $policy->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('policy_delete')
                                                <form action="{{ route('frontend.policies.destroy', $policy->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('policy_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.policies.massDestroy') }}",
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
  let table = $('.datatable-Policy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
