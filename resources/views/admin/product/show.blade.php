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
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.default_image') }}
                        </th>
                        <td>
                            <div class="d-flex">
                                <img style="max-height: 100px"  src="{{isset($product->default_image) ? $product->default_image : '#'}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.name_product') }}
                        </th>

                        <td>
                            {{ $product->name_product }}
                        </td>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                        </th>
                        <td >
                            <div class="row">
                                <div class="content" id="description" >

                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <td>
                            {{ $product->price }}
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
    <script>
        function test(){
            var product=@json($product['description']);
            var x = document.getElementById('description');
            x.insertAdjacentHTML("beforebegin",product);
        }
        test();
    </script>
@endsection
