@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product_size.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("product-size.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name_product_size') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product_size.fields.name_product_size') }}*</label>
                    <input type="text" id="name_product_size" name="name_product_size" class="form-control" value="{{ old('name_product_size', isset($permission) ? $permission->title : '') }}" required>
                    @if($errors->has('name_product_size'))
                        <p class="help-block">
                            {{ $errors->first('name_product_size') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product_size.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('code_size') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product_size.fields.code_product_size') }}*</label>
                    <input type="text" id="code_size" name="code_size" class="form-control" value="{{ old('code_size', isset($permission) ? $permission->code_size : '') }}" required>
                    @if($errors->has('code_size'))
                        <p class="help-block">
                            {{ $errors->first('code_size') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product_size.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description_product_size') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.permission.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description_product_size', isset($permission) ? $permission->description : '') }}</textarea>
                    @if($errors->has('description_product_size'))
                        <p class="help-block">
                            {{ $errors->first('description_product_size') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.permission.fields.description_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
