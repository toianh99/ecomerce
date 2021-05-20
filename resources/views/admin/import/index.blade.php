@extends('layouts.admin')
@section('content')
    @can('import_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('import.create') }}">
                    Import
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
                            Nhà Cung Cấp
                        </th>
                        <th>
                            Người Nhập
                        </th>
                        <th>
                            &nbsp;Ngày nhập
                        </th>
                        <th>
                            &nbsp;Trạng Thái
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($imports as $key => $import)
                        <tr data-entry-id="{{ $import->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $import->id ?? '' }}
                            </td>
                            <td>
                                {{ $import->supplier->name ?? '' }}
                            </td>
                            <td>
                                {{ $import->user->name ?? '' }}
                            </td>
                            <td>
{{--                                {{ $brand->user->name ?? '' }}--}}

                                @if($import->status==1)
                                    {{'Đang Vận Chuyển'}}
                                @elseif($import->status==2)
                                    {{'Đã Về'}}
                                @elseif($import->status==3)
                                    {{'Chờ xác nhận'}}
                                @endif
                            </td>

                            <td>
                                @can('import_show')
                                    <a class="btn btn-xs btn-primary" href="{{route('import.show',$import->id)}}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('import_edit')
                                    <a class="btn btn-xs btn-info" href="{{route('import.edit',$import->id)}}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('import_delete')
                                    <form action="{{ route('import.destroy', $impport->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
