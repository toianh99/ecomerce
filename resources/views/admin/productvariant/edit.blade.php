@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.product_variant.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("product-variant.update",[$productVariant->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.product_variant.fields.name_product') }}</label>
                    <select name="id_product" id="id_product" class="form-control " required >
                        <option value="" disabled selected hidden >Chọn Sản Phẩm</option>
                        @foreach($products as $product)
                            <option value="{{ $product['id'] }}" {{ (isset($productVariant) ? $productVariant->id_product : old('id_product')) == $product['id'] ? 'selected' : '' }}>{{$product['name_product']}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_product'))
                        <p class="help-block">
                            {{ $errors->first('id_product') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('id_product_size') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.product_variant.fields.size') }}</label>
                    <select name="id_product_size" id="id_product_size" class="form-control " required >
                        <option value="" disabled selected hidden >Chọn Sản Phẩm</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size['id'] }}" {{ (isset($productVariant) ? $productVariant->id_product_size : old('id_product_size')) == $size['id'] ? 'selected' : '' }}>{{$size['code_size']}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_product_size'))
                        <p class="help-block">
                            {{ $errors->first('id_product_size') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('id_product_color') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.product_variant.fields.color') }}</label>
                    <select name="id_product_color" id="id_product_color" class="form-control " required >
                        <option value="" disabled selected hidden >Chọn Sản Phẩm</option>
                        @foreach($colors as $color)
                            <option value="{{ $color['id'] }}" {{ (isset($productVariant) ? $productVariant->id_product_color : old('id_product_size')) == $color['id'] ? 'selected' : '' }}>{{$color['code_color']}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_product_color'))
                        <p class="help-block">
                            {{ $errors->first('id_product_color') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product_variant.fields.quantity') }}</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', isset($productVariant) ? $productVariant->quantity : '') }}" required>
                    @if($errors->has('quantity'))
                        <p class="help-block">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
