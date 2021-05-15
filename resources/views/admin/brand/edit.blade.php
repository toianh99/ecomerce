@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.brand.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("brand.update",[$brand->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name_brand') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.brand.fields.name') }}*</label>
                    <input type="text" id="name_brand" name="name_brand" class="form-control" value="{{ old('name_brand', isset($brand) ? $brand->name_brand : '') }}" required>
                    @if($errors->has('name_brand'))
                        <p class="help-block">
                            {{ $errors->first('name_brand') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.brand.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($brand) ? $brand->description : '') }}</textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
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
