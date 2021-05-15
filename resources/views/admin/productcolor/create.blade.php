@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product_color.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("product-color.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name_product_color') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product_color.fields.name_product_color') }}*</label>
                    <input type="text" id="name_product_color" name="name_product_color" class="form-control" value="{{ old('name_product_color', isset($permission) ? $permission->title : '') }}" required>
                    @if($errors->has('name_product_color'))
                        <p class="help-block">
                            {{ $errors->first('name_product_color') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product_color.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('code_color') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product_color.fields.code_product_color') }}*</label>
                    <input type="text" id="code_color" name="code_color" class="form-control" value="{{ old('code_color', isset($permission) ? $permission->code_color : '') }}" required>
                    @if($errors->has('code_color'))
                        <p class="help-block">
                            {{ $errors->first('code_color') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product_color.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.permission.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($permission) ? $permission->description : '') }}</textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.permission.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
