@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.book.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.books.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $book->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.book') }}
                                    </th>
                                    <td>
                                        @if($book->book)
                                            <a href="{{ $book->book->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $book->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $book->category->category ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.publisher') }}
                                    </th>
                                    <td>
                                        {{ $book->publisher }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.page') }}
                                    </th>
                                    <td>
                                        {{ $book->page }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.isbn') }}
                                    </th>
                                    <td>
                                        {{ $book->isbn }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $book->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($book->photo)
                                            <a href="{{ $book->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $book->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.book.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $book->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.books.index') }}">
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
