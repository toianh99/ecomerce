@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("payment.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.payment.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($payment) ? $payment->name : '') }}" required>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.payment.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.payment.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($payment) ? $payment->description : '') }}</textarea>
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
