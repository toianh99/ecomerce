@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.product_size.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product_size.fields.id') }}
                        </th>
                        <td>
                            {{ $productSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product_size.fields.name_product_size') }}
                        </th>

                        <td>
                            {{ $productSize->name_product_size}}
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product_size.fields.description') }}
                        </th>
                        <td>
                            {{ $productSize->description_product_size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product_size.fields.code_product_size') }}
                        </th>
                        <td>
                            {{ $productSize->code_size }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <nav class="mb-3">
                <div class="nav nav-tabs">

                </div>
            </nav>
            <div class="tab-content">

            </div>
        </div>
    </div>
@endsection

