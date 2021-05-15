@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("permission.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.permission.fields.title') }}*</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}" required>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.permission.fields.title_helper') }}
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
