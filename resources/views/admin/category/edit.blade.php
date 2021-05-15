@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("category.update",[$category->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name_category') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.brand.fields.name') }}*</label>
                    <input type="text" id="name_category" name="name_category" class="form-control" value="{{ old('name_category', isset($category) ? $category->name_category : '') }}" required>
                    @if($errors->has('name_category'))
                        <p class="help-block">
                            {{ $errors->first('name_category') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.category.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.category.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($category) ? $category->description : '') }}</textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.category.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
