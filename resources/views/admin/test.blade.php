@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
{{--            <img src="{{secure_asset('storage/photos/1/test.jpg')}}">--}}
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <textarea id="tinymce" name="tinymce"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        //tinymce.baseURL = "js/tinymce";
        tinymce.init({
                selector: "textarea#tinymce",
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount imagetool'
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
@stop
