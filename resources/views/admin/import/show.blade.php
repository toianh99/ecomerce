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
                    <input type="text" id="date_import" name="date_import" class="form-control" value="{{ $import->import_date  }}" readonly>
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
                    <select name="supplier_id" id="supplier_id" class="form-control " readonly>
                            <option value="{{ $import->supplier->id }}" selected>{{$import->supplier->name}}</option>
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
                                    <td>Số Lượng</td>
                                    <td>Giá Nhập</td>
                                    <td>Thành tiền</td>
                                    <td>Đơn Vị</td>
                                </tr>
                                </thead>
                                <tbody id="onLoadTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                        {{ trans('global.back_to_list') }}
                    </a>
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
                        supplier_id:supplier_id,
                        purchase_price:purchase_price
                    },
                    success:function(data){
                        $("#exampleModal").modal('hide');
                        onLoadTable();
                    }

                });
            }else if ($('#save').val()=='edit') {
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
                    var sum=0;
                    data.forEach(d=>{
                        // console.log(d.quantity);
                        tb+='<tr>';
                        tb+='<td>'+d.id+'</td>';
                        tb+='<td>'+d.product+'</td>';
                        tb+='<td>'+d.size+'</td>';
                        tb+='<td>'+d.color+'</td>';
                        tb+='<td>'+d.quantity+'</td>';
                        tb+='<td>'+d.purchase_price+'</td>';
                        tb+='<td>'+d.quantity*d.purchase_price+'</td>';
                        tb+='<td>VNĐ</td>'
                        tb+='</tr>';
                        sum+=d.quantity*d.purchase_price;
                    });
                    tb+='<tr>' +
                        '<td colspan="6">Tổng Tiền Nhập</td><td>'+sum+'</td><td>VNĐ</td>' +
                        '</tr>';
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
                    ids.forEach(e=>{
                        e.import_id=data.id;
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('importDetail.index')}}/updateID",
                        data: {
                            ids:ids
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
