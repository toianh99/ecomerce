@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Thêm Nhà Cung Cấp
        </div>

        <div class="card-body">
            <form action="{{ route("supplier.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Tên Nhà Cung Cấp</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Số Điện Thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Địa Chỉ</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
