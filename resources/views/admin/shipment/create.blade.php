@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.shipment.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("shipment.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.payment.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($shipment) ? $shipment->name : '') }}" required>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.shipment.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.shipment.fields.cost') }}*</label>
                    <input type="number" id="cost" name="cost" class="form-control" value="{{ old('name', isset($shipment) ? $shipment->cost : '') }}" required>
                    @if($errors->has('cost'))
                        <p class="help-block">
                            {{ $errors->first('cost') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.shipment.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.shipment.fields.description') }}</label>
                    <textarea id="description" name="description" class="form-control ">{{ old('description', isset($shipment) ? $shipment->description : '') }}</textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.shipment.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
