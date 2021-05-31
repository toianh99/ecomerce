@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            CHi Tiết Đơn Hàng
        </div>

        <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="title">Order Date</label>
                            <input type="text" id="date_export" name="date_export" class="form-control" value="{{$order->created_at}}" disabled >
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Code order</label>
                            <input type="text" value="{{$order->id}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">FullName</label>
                            <input type="text" value="{{$order->fullName}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">PhoneNumber</label>
                            <input type="text" value="{{$order->phoneNumber}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Address</label>
                            <input type="text" value="{{$order->address}}" class="form-control" disabled/>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Email</label>
                            <input type="text" value="{{$order->email}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Thanh Toán</label>
                            <input type="text" value="Tiền Mặt" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Email</label>
                            <input type="text" value="{{$order->email}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Email</label>
                            <input type="text" value="{{$order->email}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Giao Hàng</label>
                            <input type="text" value="{{$order->shipment->name}}" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Người đặt</label>
                            <input type="text" value="{{$order->user->name}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Thành phố</label>
                            <input type="text" value="{{$order->city}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Trạng Thái</label>
                            <input type="text" value="{{$order->statushi()}}" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Giảm giá</label>
                            <input type="text" value="{{$order->promotion->discount}}%" class="form-control" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="status">Tổng Thanh Toán</label>
                            <input type="text" value="{{$sum}}" class="form-control" disabled/>
                        </div>
                    </div>
                </div>
                <div class="card">
{{--                    <div class="card-header d-flex">--}}
{{--                        Danh Sách Sản Đã Đặt--}}
{{--                        <div class="ml-auto">--}}
{{--                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success text-white">Thêm Sản Phẩm Nhập</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog" role="document">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm Nhập</h5>--}}
{{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-footer">--}}
{{--                                    <input type="button" value="Close" class="btn btn-secondary" data-dismiss="modal">--}}
{{--                                    <input type="button" value="Save" id="save" class="btn btn-primary btn-submit">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="importDetails" class=" table table-bordered table-striped table-hover datatable datatable-Client">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name Product</td>
                                    <td>Size</td>
                                    <td>Color</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>ToTal</td>
                                </tr>
                                </thead>
                                <tbody id="onLoadTable">
                                    @foreach($cartItem as $c)
                                        <tr data-entry-id="{{ $c->id }}">
                                            <td>
                                                {{$c->id}}
                                            </td>
                                            <td>
                                                {{$c->product->name_product ??''}}
                                            </td>
                                            <td>
                                                {{$c->size->code_size ?? ''}}
                                            </td>
                                            <td>
                                                {{$c->color->code_color ??''}}
                                            </td>
                                            <td>
                                                {{$c->quantity  ?? ''}}
                                            </td>
                                            <td>
                                                {{(int)$c->product->price ??''}}
                                            </td>
                                            <td>
                                                {{$c->product->price*$c->quantity}}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript">
        // var ids=[];
        // // onLoadTable();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        {{--function updateOrCreate(e){--}}

        {{--    var product_id= document.getElementById('product_id').value;--}}
        {{--    var quantity=document.getElementById('quantity').value;--}}
        {{--    var size_id=document.getElementById('size_id').value;--}}
        {{--    var color_id=document.getElementById('color_id').value;--}}
        {{--    var sale_price= document.getElementById('sale_price').value;--}}
        {{--    var supplier_id=document.getElementById('supplier_id').value;--}}
        {{--    if ($("#save").val()=='Save'){--}}
        {{--        $.ajax({--}}
        {{--            method:'POST',--}}
        {{--            url: "{{route('exportDetail.store')}}",--}}
        {{--            data: {--}}
        {{--                quantity:quantity,--}}
        {{--                product_id:product_id,--}}
        {{--                size_id:size_id,--}}
        {{--                color_id:color_id,--}}
        {{--                supplier_id:supplier_id,--}}
        {{--                sale_price:sale_price--}}
        {{--            },--}}
        {{--            success:function(data){--}}
        {{--                $("#exampleModal").modal('hide');--}}
        {{--                onLoadTable();--}}
        {{--            }--}}

        {{--        });--}}
        {{--    }else if ($('#save').val()=='edit'&& e) {--}}
        {{--        $.ajax({--}}
        {{--            method: 'PUT',--}}
        {{--            url: "{{route('exportDetail.index')}}/" + e,--}}
        {{--            data: {--}}
        {{--                quantity: quantity,--}}
        {{--                product_id: product_id,--}}
        {{--                size_id: size_id,--}}
        {{--                color_id: color_id,--}}
        {{--                supplier_id: supplier_id,--}}
        {{--                sale_price: sale_price--}}
        {{--            },--}}
        {{--            success: function (data) {--}}
        {{--                $("#exampleModal").modal('hide');--}}
        {{--                onLoadTable();--}}
        {{--            }--}}

        {{--        });--}}
        {{--    }--}}
        {{--}--}}
        {{--$(".btn-submit").click(function () {--}}
        {{--        updateOrCreate();--}}
        {{--    }--}}
        {{--);--}}

        {{--function onLoadTable() {--}}
        {{--    var tb ='';--}}
        {{--    $.ajax({--}}
        {{--        type: 'GET',--}}
        {{--        url:"{{route('exportDetail.index')}}",--}}
        {{--        success:function (data){--}}
        {{--            console.log(data);--}}
        {{--            ids=data;--}}
        {{--            data.forEach(d=>{--}}
        {{--                // console.log(d.quantity);--}}
        {{--                tb+='<tr>';--}}
        {{--                tb+='<td>'+d.id+'</td>';--}}
        {{--                tb+='<td>'+d.product+'</td>';--}}
        {{--                tb+='<td>'+d.size+'</td>';--}}
        {{--                tb+='<td>'+d.color+'</td>';--}}
        {{--                tb+='<td>'+d.quantity+'</td>';--}}
        {{--                tb+='<td>'+d.sale_price+'</td>';--}}
        {{--                tb+="<td><input type='button' value='edit' class=\" m-1 btn btn-xs btn-info\" onclick='onEdit("+d.id+")'><input type='button' value='Delete' class=\"btn btn-xs btn-danger\" onclick='onDelete("+d.id+")'></td>";--}}
        {{--                tb+='</tr>';--}}
        {{--            });--}}
        {{--            document.getElementById('onLoadTable').innerHTML=tb;--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}
        {{--function onEdit(e) {--}}
        {{--    $("#exampleModal").modal('show');--}}
        {{--    $.ajax({--}}
        {{--        type: 'GET',--}}
        {{--        url:"{{route('exportDetail.index')}}/"+e,--}}
        {{--        success:function (data){--}}
        {{--            document.getElementById('quantity').value=data.quantity;--}}
        {{--            document.getElementById('size_id').value=data.size_id;--}}
        {{--            document.getElementById('color_id').value=data.color_id;--}}
        {{--            document.getElementById('sale_price').value=data.sale_price;--}}
        {{--            document.getElementById('product_id').value=data.product_id;--}}
        {{--            $('#save').val('edit');--}}
        {{--            $(".btn-submit").click(function () {--}}
        {{--                    console.log(e);--}}
        {{--                    updateOrCreate(e);--}}
        {{--                }--}}
        {{--            );--}}

        {{--        }--}}
        {{--    });--}}
        {{--}--}}
        {{--function onDelete(e){--}}
        {{--    var cf = confirm('Bạn có muốn xóa ? ');--}}
        {{--    if (cf==true){--}}
        {{--        $.ajax({--}}
        {{--            type:'DELETE',--}}
        {{--            url:"{{route('exportDetail.index')}}/"+e,--}}
        {{--            success:function (data){--}}
        {{--                onLoadTable();--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--}--}}
        {{--function updateIdImportDetail(id){--}}
        {{--    $.ajax({--}}
        {{--        method:'PUT',--}}
        {{--        url: "{{route('exportDetail.index')}}",--}}
        {{--        data: {ids:ids--}}
        {{--        },--}}
        {{--        success:function(data){--}}
        {{--            $("#exampleModal").modal('hide');--}}
        {{--            onLoadTable();--}}
        {{--        }--}}

        {{--    });--}}
        {{--}--}}

        {{--function onSubmit(){--}}
        {{--    var date_export=document.getElementById('date_export').value;--}}
        {{--    var supplier_id=document.getElementById('supplier_id').value;--}}
        {{--    $.ajax({--}}
        {{--        type:'POST',--}}
        {{--        url:"{{route('export.index')}}",--}}
        {{--        data: {--}}
        {{--            export_date:date_export,--}}
        {{--            supplier_id:supplier_id--}}
        {{--        },--}}
        {{--        success:function (data){--}}
        {{--            $.ajax({--}}
        {{--                type:'POST',--}}
        {{--                url:"{{route('exportDetail.index')}}/updateID",--}}
        {{--                data: {--}}
        {{--                    id:data.id--}}
        {{--                },--}}
        {{--                success:function (data){--}}
        {{--                    window.location.replace("{{route('export.index')}}");--}}
        {{--                }--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}

    </script>
@endsection
