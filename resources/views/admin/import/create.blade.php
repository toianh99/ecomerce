@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Thêm Đơn Nhập
        </div>

        <div class="card-body">
            <form action="{{ route("import.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="title">Ngày Nhập</label>
                    <input type="date" id="date_import" name="date_import" class="form-control" value="{{ old('date_import', isset($brand) ? $brand->name_brand : '') }}" >
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.brand.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                    <label for="status">Nhà Cung Cấp</label>
                    <select name="supplier_id" id="supplier_id" class="form-control ">
                        <option value=""  hidden>Vui Lòng Chọn Nhà Cung Cấp</option>
                        @foreach($suppliers as $id => $supplier)
                            <option value="{{ $supplier['id'] }}" {{ (isset($supplier) && $supplier->id ? $supplier->id: old('supplier_id')) == $supplier['id'] ? 'selected' : '' }}>{{$supplier['name']}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
                <div class="card">
                        <div class="card-header d-flex">
                            Danh Sách Sản Phẩm Nhập
                            <div class="ml-auto">
                               <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success text-white">Thêm Sản Phẩm Nhập</button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm Nhập</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <form id="post-form">
                                                    @csrf
                                                    <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                                                        <label for="status">Chọn Sản Phẩm</label>
                                                        <select name="product_id" id="product_id" class="form-control ">
                                                            <option value="" hidden >Vui Lòng Chọn Sản Phẩm</option>
                                                            @foreach($products as $id => $product)
                                                                <option value="{{ $product['id'] }}" }}>{{$product['name_product']}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('category'))
                                                            <p class="help-block">
                                                                {{ $errors->first('category') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group {{ $errors->has('purchase_price') ? 'has-error' : '' }}">
                                                        <label for="title">Giá Nhập</label>
                                                        <input type="number" id="purchase_price" name="purchase_price" class="form-control" value="{{ old('purchase_price', isset($brand) ? $brand->name_brand : '') }}">
                                                        @if($errors->has('purchase_price'))
                                                            <p class="help-block">
                                                                {{ $errors->first('purchase_price') }}
                                                            </p>
                                                        @endif
                                                        <p class="helper-block">
                                                            {{ trans('cruds.brand.fields.title_helper') }}
                                                        </p>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                                                        <label for="status">Màu</label>
                                                        <select name="color_id" id="color_id" class="form-control ">
                                                            <option value="" hidden >Vui Lòng Chọn Màu</option>
                                                            @foreach($colors as $id => $color)
                                                                <option value="{{ $color['id'] }}" }}>{{$color['code_color']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                                                        <label for="status">Kích Cỡ</label>
                                                        <select name="size_id" id="size_id" class="form-control ">
                                                            <option value="" hidden >Vui Lòng Chọn Kích Cỡ</option>
                                                            @foreach($sizes as $id => $size)
                                                                <option value="{{ $size['id'] }}" }}>{{$size['code_size']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                                        <label for="title">Số Lượng</label>
                                                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', isset($brand) ? $brand->name_brand : '') }}">
                                                        @if($errors->has('quantity'))
                                                            <p class="help-block">
                                                                {{ $errors->first('quantity') }}
                                                            </p>
                                                        @endif
                                                        <p class="helper-block">
                                                            {{ trans('cruds.brand.fields.title_helper') }}
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" value="Close" class="btn btn-secondary" data-dismiss="modal">
                                        <input type="button" value="Save" id="save" class="btn btn-primary btn-submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="importDetails" class=" table table-bordered table-striped table-hover datatable datatable-Client">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Tên Sản Phẩm</td>
                                        <td>Size</td>
                                        <td>Màu</td>
                                        <td>Giá Nhập</td>
                                        <td>Số Lượng</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody id="onLoadTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <input onclick="onSubmit()" class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var ids=[];
        onLoadTable();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function updateOrCreate(e){

            var product_id= document.getElementById('product_id').value;
            var quantity=document.getElementById('quantity').value;
            var size_id=document.getElementById('size_id').value;
            var color_id=document.getElementById('color_id').value;
            var purchase_price= document.getElementById('purchase_price').value;
            var supplier_id=document.getElementById('supplier_id').value;
            if ($("#save").val()=='Save'){
                $.ajax({
                    method:'POST',
                    url: "{{route('importDetail.store')}}",
                    data: {
                        quantity:quantity,
                        product_id:product_id,
                        size_id:size_id,
                        color_id:color_id,
                        purchase_price:purchase_price
                    },
                    success:function(data){
                        $("#exampleModal").modal('hide');
                        onLoadTable();
                    }

                });
            }else if ($('#save').val()=='edit'&& e) {
                $.ajax({
                    method: 'PUT',
                    url: "{{route('importDetail.index')}}/" + e,
                    data: {
                        quantity: quantity,
                        product_id: product_id,
                        size_id: size_id,
                        color_id: color_id,
                        supplier_id: supplier_id,
                        purchase_price: purchase_price
                    },
                    success: function (data) {
                        $("#exampleModal").modal('hide');
                        onLoadTable();
                    }

                });
            }
        }
        $(".btn-submit").click(function () {
                updateOrCreate();
            }
            );

        function onLoadTable() {
            var tb ='';
            $.ajax({
                type: 'GET',
                url:"{{route('importDetail.index')}}",
                success:function (data){
                    // console.log(data);
                    ids=data;
                    data.forEach(d=>{
                        // console.log(d.quantity);
                        tb+='<tr>';
                        tb+='<td>'+d.id+'</td>';
                        tb+='<td>'+d.product+'</td>';
                        tb+='<td>'+d.size+'</td>';
                        tb+='<td>'+d.color+'</td>';
                        tb+='<td>'+d.quantity+'</td>';
                        tb+='<td>'+d.purchase_price+'</td>';
                        tb+="<td><input type='button' value='edit' class=\" m-1 btn btn-xs btn-info\" onclick='onEdit("+d.id+")'><input type='button' value='Delete' class=\"btn btn-xs btn-danger\" onclick='onDelete("+d.id+")'></td>";
                        tb+='</tr>';
                    });
                    document.getElementById('onLoadTable').innerHTML=tb;
                }
            });
        }
        function onEdit(e) {
            $("#exampleModal").modal('show');
            $.ajax({
                type: 'GET',
                url:"{{route('importDetail.index')}}/"+e,
                success:function (data){
                    document.getElementById('quantity').value=data.quantity;
                    document.getElementById('size_id').value=data.size_id;
                    document.getElementById('color_id').value=data.color_id;
                    document.getElementById('purchase_price').value=data.purchase_price;
                    document.getElementById('product_id').value=data.product_id;
                    $('#save').val('edit');
                    $(".btn-submit").click(function () {
                        console.log(e);
                            updateOrCreate(e);
                        }
                    );

                }
            });
        }
        function onDelete(e){
            var cf = confirm('Bạn có Muốn xóa ? ');
            if (cf==true){
                $.ajax({
                    type:'DELETE',
                    url:"{{route('importDetail.index')}}/"+e,
                    success:function (data){
                        onLoadTable();
                    }
                });
            }
        }
        function updateIdImportDetail(id){
            $.ajax({
                method:'PUT',
                url: "{{route('importDetail.index')}}",
                data: {ids:ids
                },
                success:function(data){
                    $("#exampleModal").modal('hide');
                    onLoadTable();
                }

            });
        }

        function onSubmit(){
            var date_import=document.getElementById('date_import').value;
            var supplier_id=document.getElementById('supplier_id').value;
            $.ajax({
                type:'POST',
                url:"{{route('import.index')}}",
                data: {
                    import_date:date_import,
                    supplier_id:supplier_id
                },
                success:function (data){
                    $.ajax({
                        type:'POST',
                        url:"{{route('importDetail.index')}}/updateID",
                        data: {
                           id:data.id
                        },
                        success:function (data){
                            window.location.replace("{{route('import.index')}}");
                        }
                    });
                }
            });
        }
    </script>
@endsection
