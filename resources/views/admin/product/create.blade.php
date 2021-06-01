@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("product.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name_product') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.name_product') }}</label>
                    <input type="text" id="name_product" name="name_product" class="form-control" value="{{ old('name_product', isset($product) ? $product->name_product : '') }}" required>
                    @if($errors->has('name_product'))
                        <p class="help-block">
                            {{ $errors->first('name_product') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.description') }}</label>
                    <textarea id="description" class="tinymce" name="description" value="{{ old('description', isset($product) ? $product->description : '') }}" ></textarea>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.price') }}</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.sale') }}</label>
                    <input type="number" id="sale_price" name="sale_price" class="form-control" value="{{ old('sale', isset($product) ? $product->sale_price : '') }}" required>
                    @if($errors->has('sale_price'))
                        <p class="help-block">
                            {{ $errors->first('sale_price') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('default_image') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.default_image') }}</label>
                    <div class="input-group">
                    <input type="button" id="lfm" data-input="thumbnail" data-preview="holder" value="Upload">
                    <input id="thumbnail" class="form-control" type="text" name="default_image" {{ old('price', isset($product) ? $product->default_image : '') }}>
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @if($errors->has('default_image'))
                        <p class="help-block">
                            {{ $errors->first('default_image') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('default_image') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.default_image') }}</label>
                    <div class="input-group">
                        <input type="button" id="lfm" data-input="thumbnail" data-preview="holder" value="Upload">
                        <input id="thumbnail" class="form-control" type="text" name="image1" {{ old('price', isset($product) ? $product->image1 : '') }}>
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @if($errors->has('image1'))
                        <p class="help-block">
                            {{ $errors->first('image1') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('overview') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.product.fields.overview') }}</label>
                    <textarea id="overview" class="form-control " name="overview" value="{{ old('overview', isset($product) ? $product->overview : '') }}" ></textarea>
                    @if($errors->has('overview'))
                        <p class="help-block">
                            {{ $errors->first('overview') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.product.fields.status') }}</label>
                    <select name="status_id" id="status" class="form-control">
                        <option value="1" {{ old('status_id', isset($product) ? $product->status : '') }}>Đang kinh doanh</option>
                        <option value="2" {{ old('status_id', isset($product) ? $product->status : '') }}>Ngừng Kinh doanh</option>
                        <option value="3" {{ old('status_id', isset($product) ? $product->status : '') }}>Đang tạm hết hàng</option>
                    </select>
                    @if($errors->has('status_id'))
                        <p class="help-block">
                            {{ $errors->first('status_id') }}
                        </p>
                    @endif
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
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
            }
        });
    </script>
{{--    <script>--}}
{{--        Dropzone.options.documentFileDropzone = {--}}
{{--            url: '{{ route('admin.documents.storeMedia') }}',--}}
{{--            maxFilesize: 2, // MB--}}
{{--            maxFiles: 1,--}}
{{--            addRemoveLinks: true,--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--            },--}}
{{--            params: {--}}
{{--                size: 2--}}
{{--            },--}}
{{--            success: function (file, response) {--}}
{{--                $('form').find('input[name="document_file"]').remove()--}}
{{--                $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')--}}
{{--            },--}}
{{--            removedfile: function (file) {--}}
{{--                file.previewElement.remove()--}}
{{--                if (file.status !== 'error') {--}}
{{--                    $('form').find('input[name="document_file"]').remove()--}}
{{--                    this.options.maxFiles = this.options.maxFiles + 1--}}
{{--                }--}}
{{--            },--}}
{{--            init: function () {--}}
{{--                @if(isset($document) && $document->document_file)--}}
{{--                var file = {!! json_encode($document->document_file) !!}--}}
{{--                    this.options.addedfile.call(this, file)--}}
{{--                file.previewElement.classList.add('dz-complete')--}}
{{--                $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')--}}
{{--                this.options.maxFiles = this.options.maxFiles - 1--}}
{{--                @endif--}}
{{--            },--}}
{{--            error: function (file, response) {--}}
{{--                if ($.type(response) === 'string') {--}}
{{--                    var message = response //dropzone sends it's own error messages in string--}}
{{--                } else {--}}
{{--                    var message = response.errors.file--}}
{{--                }--}}
{{--                file.previewElement.classList.add('dz-error')--}}
{{--                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')--}}
{{--                _results = []--}}
{{--                for (_i = 0, _len = _ref.length; _i < _len; _i++) {--}}
{{--                    node = _ref[_i]--}}
{{--                    _results.push(node.textContent = message)--}}
{{--                }--}}

{{--                return _results--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
@stop
