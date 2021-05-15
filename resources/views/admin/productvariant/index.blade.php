@extends('layouts.admin')
@section('content')
    @can('client_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.product-variant.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.product_variant.title_singular') }}
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
                            {{ trans('cruds.product_variant.fields.name_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.product_variant.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product_variant.fields.sale') }}
                        </th>
                        <th>
                            {{ trans('cruds.product_variant.fields.brand') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productVariants as $key => $productVariant)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productVariant->id ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->product->name_product ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->productSize->name_product_size ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->productColor->name_product_color ?? '' }}
                            </td>

                            <td>
                                {{ $productVariant->quantity ?? '' }}
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="#">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="#">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('client_delete')
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            @can('client_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.clients.massDestroy') }}",
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
