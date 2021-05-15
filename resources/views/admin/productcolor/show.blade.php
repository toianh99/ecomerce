@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.product_color.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product_color.fields.id') }}
                        </th>
                        <td>
                            {{ $productColor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product_color.fields.name_product_color') }}
                        </th>

                        <td>
                            {{ $productColor->name_product_color }}
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product_color.fields.description') }}
                        </th>
                        <td>
                            {{ $productColor->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product_color.fields.code_product_color') }}
                        </th>
                        <td>
                            {{ $productColor->code_color }}
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
