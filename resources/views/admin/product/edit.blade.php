@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("product.update",[$product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name_product') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.name_product') }}*</label>
                    <input type="text" id="name_product" name="name_product" class="form-control" value="{{ old('name_product', isset($product) ? $product->name_product : '') }}" required>
                    @if($errors->has('name_product'))
                        <p class="help-block">
                            {{ $errors->first('name_category') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                    <textarea id="description" class="tinymce" name="description" value="{{ old('description', isset($product) ? $product->description : '') }}" ></textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.category.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.price') }}*</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.sale_price') }}*</label>
                    <input type="text" id="sale_price" name="sale_price" class="form-control" value="{{ old('price', isset($product) ? $product->sale_price : '') }}" required>
                    @if($errors->has('sale_price'))
                        <p class="help-block">
                            {{ $errors->first('sale_price') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.product.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.product.fields.status') }}</label>
                    <select name="status_id" id="status" class="form-control">
                        <option value="1" {{ (isset($product) ? $product->status : old('status_id')) == 1 ? 'selected' : '' }}>Đang kinh doanh</option>
                        <option value="2" {{ (isset($product) ? $product->status : old('status_id')) == 2 ? 'selected' : '' }}>Ngừng Kinh doanh</option>
                        <option value="3" {{ (isset($product) ? $product->status : old('status_id')) == 3 ? 'selected' : '' }}>Đang tạm hết hàng</option>
                    </select>
                    @if($errors->has('status_id'))
                        <p class="help-block">
                            {{ $errors->first('status_id') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('default_image') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.default_image') }}</label>
                    <div class="input-group">
                        <input type="button" id="lfm" data-input="thumbnail" data-preview="holder" value="Upload">
                        <input id="thumbnail" class="form-control" type="text" name="default_image" value="{{ old('default_image', isset($product) ? $product->default_image : '')}}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        @if(isset($product))
                            <img src="{{$product->default_image}}" style="margin-top:15px;max-height:100px;">
                        @endif
                    </div>
                    @if($errors->has('default_image'))
                        <p class="help-block">
                            {{ $errors->first('default_image') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.product.fields.category') }}</label>
                    <select name="category_id" id="category" class="form-control ">
                        @foreach($categories as $id => $category)
                            <option value="{{ $category['id'] }}" {{ (isset($product) && $product->category ? $product->category->id : old('$category_id')) == $category['id'] ? 'selected' : '' }}>{{$category['name_category']}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                    <label for="brand_id">{{ trans('cruds.product.fields.brand') }}</label>
                    <select name="brand_id" id="brand" class="form-control ">
                        @foreach($brands as $brand)

                            <option value="{{ $brand['id']}}" {{ (isset($product) && $product->brand ? $product->brand->id : old('$brand_id')) == $brand['id'] ? 'selected' : '' }}>{{$brand['name_brand']}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('brand'))
                        <p class="help-block">
                            {{ $errors->first('brand') }}
                        </p>
                    @endif
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{secure_asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
        var desc = @json($product['description']);
    </script>
    <script>
        tinymce.baseURL = "http://127.0.0.1:8000/js/tinymce";
        tinymce.init({
            selector: "textarea.tinymce",
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | image',
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            file_picker_callback: function (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                let type = 'image' === meta.filetype ? 'Images' : 'Files',
                    url  = '/laravel-filemanager?editor=tinymce5&type=' + type;

                tinymce.activeEditor.windowManager.openUrl({
                    url : url,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },
            setup: function (editor) {
                editor.on('init', function (e) {
                    editor.setContent(unescape(desc));
                });
            }
        });
    </script>
    @endsection
