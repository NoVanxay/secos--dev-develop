@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('book_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.books.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.book.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.book.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Book">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.book') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.publisher') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.page') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.isbn') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.book.fields.photo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $key => $book)
                                    <tr data-entry-id="{{ $book->id }}">
                                        <td>
                                            {{ $book->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($book->book)
                                                <a href="{{ $book->book->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $book->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $book->category->category ?? '' }}
                                        </td>
                                        <td>
                                            {{ $book->publisher ?? '' }}
                                        </td>
                                        <td>
                                            {{ $book->page ?? '' }}
                                        </td>
                                        <td>
                                            {{ $book->isbn ?? '' }}
                                        </td>
                                        <td>
                                            {{ $book->price ?? '' }}
                                        </td>
                                        <td>
                                            @if($book->photo)
                                                <a href="{{ $book->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $book->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('book_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.books.show', $book->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('book_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.books.edit', $book->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('book_delete')
                                                <form action="{{ route('frontend.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('book_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.books.massDestroy') }}",
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
  let table = $('.datatable-Book:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
