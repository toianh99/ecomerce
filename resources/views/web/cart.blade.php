<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{route('web-home')}}"><img src="{{asset('storage/photos/1/logo/60a8762d61011.png')}}" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{route('web-home')}}">Home</a></li>
                    <li><a href="{{route('api-product.index')}}">Products</a></li>
                    {{--                    <li><a href="">About</a></li>--}}
                    {{--                    <li><a href="">Contact</a></li>--}}
                    {{--                    <li><a href="account.html">Account</a></li>--}}
                </ul>
            </nav>
            <a href="{{route('cart.index')}}"><img src="{{asset('storage/photos/1/cart/60a8773387b3b.png')}}" width="30px" height="30px"></a>
            <div>
                <span id="count_cart"></span>
            </div>
            <img src="images/menu.png" class="menu-icon"
                 onclick="menutoggle()">
        </div>

    </div>
</div>

<!-- -----------------cart item details------------------- -->
<div class="small-container cart-page">
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th>NameProduct</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Tổng thanh toán</th>
        </tr>
        </thead>
        <tbody id="cart_body">
        <style>
            .mid{
                text-align: center;
            }
        </style>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" style="text-align:right">Mã Giảm Giá</td>
            <td><input onChange="onSearch()" style="width: 30%;float: right" type="text" id="search" placeholder="Mã giảm giá"/>
                <input type="hidden" name="promotion" id="promotion"   />
                <p style="color:red;font-size:10px;margin-left: 150px" id="error"></p>
            </td>


        </tr>
        <tr>
            <td colspan="4" style="text-align:right">Mã Giảm Giá</td>
            <td>

                <select name="shipment" id="shipment" onChange="onSelect()" >
                    @foreach($shipment as $s)
                    <option value="{{$s->id}}">{{$s->name}} + ({{$s->cost}}) đồng</option>
                    @endforeach

                </select>

            </td>
        </tr>
        <tr id="total">


        </tr>
        </tfoot>
    </table>

    <div class="total-price">
        <table>


        </table>

    </div>
    <div class="d-flex">
        <div style="float: right">
            <a onclick="order()" class="btn btn-danger" style="margin-left: auto">Thanh Toán</a>
        </div>
    </div>


</div>


<!-- ------------footer----------- -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1" >
                <h3>Download Our App</h3>
                <p>Download App for Android and ios mobile phone</p>
                <div class="app-logo">
                    <img src="{{asset('storage/photos/1/footer/google.png')}}">
                    <img src="{{asset('storage/photos/1/footer/apple.png')}}">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="{{asset('storage/photos/1/footer/logo_footer.png')}}">
                <p>Our Purpose Is To Sustainably Make the Pleasure and
                    Benefits of Sports Accessible to the Many</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube </li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="Copyright">Copyright 2021 - By Toileanh</p>
    </div>
</div>
<!-- ------------------- js for toggle menu-------------- -->
<script>
    var cart_id;
    var shipment=  {!! json_encode($shipment->toArray()) !!};
    console.log(shipment);
    var cart;
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";
    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        }
        else {
            MenuItems.style.maxHeight = "0px";
        }
    }
    function onLoadCart(){

        $.ajax({
            type:'GET',
            url:"{{route('cartDetail.index')}}",
            success:function (data) {
                var total=0;
                document.getElementById('count_cart').innerText=data.length;
                var tb="";
                cart=data;
                data.forEach(d=>{
                    cart_id=d.cart_id;
                    tb+="<tr>" +

                        "<td class=''mid'  >" +
                        "<div class='cart-info' style='display:flex;'><img style='margin:auto' src='"+d.product.image_default+"'><div>" +
                        "</td>"+
                        "<td class='mid'>"+
                        "<p style='text-align:center'>"+d.product.product_name+"</p>" +
                        "</td>"+
                        "<td class='mid'>"+
                        "<p style='text-align:cente' > "+d.product.price+"</p>" +
                        "</td>"+
                        "<td>" +
                        "<div style='display:flex'>"+
                        "<div style='margin: auto'>"+
                        "<input onChange='onUpdateCart("+d.id+")' id='quantity' type='number' min='1' value='"+d.quantity+"'>" +
                        "</div>"+
                        "</div>"+
                        "</td>" +
                        "<td >"+d.product.price*d.quantity+"</td>" +
                        "</tr>";
                    total+=d.product.price*d.quantity;
                });
                // console.log(total);
                document.getElementById('cart_body').innerHTML=tb;
                document.getElementById('total').innerHTML=" <td colspan='4' style='text-align: right'>Total</td><td>"+total+"</td>";
            }
        });
    }
    onLoadCart();
    function onUpdateCart(data) {
        var quantity=document.getElementById('quantity').value;
        $.ajax({
           type:'POST',
           url:"{{route('cartDetail.index')}}/updateQuantity",
           data: {
                id: data,
                quantity:quantity
           },
            success: function (data) {
                onLoadCart();
            }
        });
    }

        function order() {
        var promotion_id = document.getElementById('promotion').value;
        var shipment_id = document.getElementById('shipment').value;
        $.ajax({
        type:'POST',
        url:"{{route('checkout.store')}}",
        data: {
        promotion_id:promotion_id,
        shipment_id:shipment_id,
            cart_id:cart_id
    },
        success: function (data) {
        console.log(data);

            window.location.replace("{{route('checkout.index')}}");

            }
            });

    }

     function onSelect(){
        var ship = document.getElementById('shipment').value;
        shipment.forEach(s=>{
            if (ship==s.id){
                localStorage.setItem('ship',s.cost);
                onSearch();
            }
        });
    }


</script>
<script type="text/javascript">
    function onSearch() {
        var text = document.getElementById('search').value;
        $.ajax({
            type:'POST',
            url:"{{route('promotion.index')}}/search",
            data: {
                text:text
            },
            success: function (data) {
                console.log(data);
                if (data.length!=0){
                    document.getElementById('promotion').value = data.id;
                    document.getElementById('error').innerHTML=data.discount;
                    localStorage.setItem('discount',data.discount);
                    var tien=0;
                    console.log(cart);
                    cart.forEach(d=>{
                        var shipT=Number.parseInt(localStorage.getItem('ship'));
                        tien+=d.product.price*d.quantity*(100-data.discount)/100+shipT;
                    });
                    document.getElementById('total').innerHTML="<td colspan='4' style='text-align: right'>Total</td><td>"+tien+"</td>";

                }
                else{

                    document.getElementById('error').innerHTML='mã giảm giá không đúng';


                }
            }
        });
    }
</script>

</body>

</html>
