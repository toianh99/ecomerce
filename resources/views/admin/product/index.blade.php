@extends('layouts.admin')
@section('content')
    @can('product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("product.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            TEST
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Client">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.name_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.default_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.sale') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $client->id ?? '' }}
                            </td>
                            <td>
                                {{ $client->name_product ?? '' }}
                            </td>
                            <td>
                                {{ $client->price ?? '' }}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <img style="max-height: 100px" class="m-auto" src="{{isset($client->default_image) ? $client->default_image : '#'}}">
                                </div>
                            </td>
                            <td>
                                {{ $client->sale_price ?? '' }}
                            </td>
                            <td>
                                {{ $client->brand->name_brand ?? '' }}
                            </td>
                            <td>
                                {{ $client->category->name_category ?? '' }}
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{route('product.show',$client->id)}}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{route('product.edit',$client->id)}}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('product.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        {{--    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
        {{--    @can('product_delete')--}}
        {{--    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
        {{--    let deleteButton = {--}}
        {{--        text: deleteButtonTrans,--}}
        {{--        url: "{{ route('product.destroy') }}",--}}
        {{--        className: 'btn-danger',--}}
        {{--        action: function (e, dt, node, config) {--}}
        {{--            var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
        {{--                return $(entry).data('entry-id')--}}
        {{--            });--}}

        {{--            if (ids.length === 0) {--}}
        {{--                alert('{{ trans('global.datatables.zero_selected') }}')--}}

        {{--                return--}}
        {{--            }--}}

        {{--            if (confirm('{{ trans('global.areYouSure') }}')) {--}}
        {{--                $.ajax({--}}
        {{--                    headers: {'x-csrf-token': _token},--}}
        {{--                    method: 'POST',--}}
        {{--                    url: config.url,--}}
        {{--                    data: { ids: ids, _method: 'DELETE' }})--}}
        {{--                    .done(function () { location.reload() })--}}
        {{--            }--}}
        {{--        }--}}
        {{--    }--}}
        {{--    dtButtons.push(deleteButton)--}}
        {{--    @endcan--}}

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Client:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
