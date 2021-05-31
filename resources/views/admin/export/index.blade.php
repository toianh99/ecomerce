@extends('layouts.admin')
@section('content')
    @can('export_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('export.create') }}">
                    Export
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
                            Đơn vị Nhận
                        </th>
                        <th>
                            Người Xuất
                        </th>
                        <th>
                            &nbsp;Ngày Xuất
                        </th>
                        <th>
                            &nbsp;Trạng Thái
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exports as $key => $export)
                        <tr data-entry-id="{{ $export->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $export->id ?? '' }}
                            </td>
                            <td>
                                {{ $export->supplier->name ?? '' }}
                            </td>
                            <td>
                                {{ $export->user->name ?? '' }}
                            </td>
                            <td>
                                {{$export->export_date}}
                            </td>
                            <td>
                                {{--                                {{ $brand->user->name ?? '' }}--}}

                                @if($export->status==1)
                                    {{'Đã Xuất'}}
                                @elseif($export->status==2)
                                    {{'Đang Chờ xác nhận'}}
                                @endif
                            </td>

                            <td>
                                @can('export_show')
                                    <a class="btn btn-xs btn-primary" href="{{route('export.show',$export->id)}}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('export_delete')
                                    <form action="{{ route('export.destroy', $export->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            @can('permisison_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('permission.massDestroy') }}",
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
