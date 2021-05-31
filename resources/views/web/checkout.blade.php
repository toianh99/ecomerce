<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
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
                    <li><a href="{{route('web-home')}}">Trang Chủ</a></li>
                    <li><a href="{{route('api-product.index')}}">Sản Phẩm</a></li>

                </ul>
            </nav>
            <a href="{{route('cart.index')}}"><img src="{{asset('storage/photos/1/cart/60a8773387b3b.png')}}" width="30px" height="30px"></a>
            <div>
                <span id="count_cart"></span>
            </div>
            @if(Auth::check())
                <i style="margin-left:20px;" class="fa fa-user"></i> <a  href="{{route('web.login.index')}}">{{Auth::user()->name}}</a>
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a href="" style="margin-left:20px;" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Đăng xuất</a>
            @else
                <a style="margin-left:20px;"href="{{route('web.login.index')}}">Đăng nhập/Đăng kì</a>
            @endif
            <img src="images/menu.png" class="menu-icon"
                 onclick="menutoggle()">
        </div>

    </div>
</div>

<!-- -----------------cart item details------------------- -->
<div class="small-container cart-page">
    <form action="{{route('checkout.save')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-50">
                <h3>Thông tin</h3>
                <label for="fname"><i class="fa fa-user"></i> Họ và Tên</label>
                <input type="text" id="fname" name="fullName" placeholder="Họ và Tên">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="Email@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <label for="city"><i class="fa fa-institution"></i> Thành Phố</label>
                <input type="text" id="city" name="city" placeholder="">
                <label for="phoneNumber"><i class="fa fa-institution"></i> Số Điện Thoại</label>
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="0965402971">

            </div>

            <div class="col-50">
                <h3>Thanh Toán</h3>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="1" name="optradio" style="height:auto">Tiền mặt
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="2" name="optradio"  style="height:auto">Thẻ Ngân Hàng
                    </label>
                </div>
                <br>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                <div class="row">
                    <div class="col-50">
                        <label for="expyear">Exp Year</label>
                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </div>
                    <div class="col-50">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                </div>
            </div>

        </div>
        <input type="submit" value="Thanh Toán"/>
    </form>
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }



        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }


        .btn {
            background-color: #04AA6D;
            color: white;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>


</div>


<!-- ------------footer----------- -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
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
    {{--function onLoadCart(){--}}
    {{--    var total=0;--}}
    {{--    $.ajax({--}}
    {{--        type:'GET',--}}
    {{--        url:"{{route('cartDetail.index')}}",--}}
    {{--        success:function (data) {--}}
    {{--            console.log(data);--}}
    {{--            var tb="";--}}
    {{--            data.forEach(d=>{--}}
    {{--                tb+="<tr>" +--}}
    {{--                    "<td>" +--}}
    {{--                    "<div class='cart-info'><img src='"+d.product.image_default+"'><div>" +--}}
    {{--                    "<p>"+d.product.product_name+"</p>" +--}}
    {{--                    "<small>Price: "+d.product.price+"</small><br>" +--}}
    {{--                    "<a href=''>Remove</a>" +--}}
    {{--                    "</div>" +--}}
    {{--                    "</div>" +--}}
    {{--                    "<td>" +--}}
    {{--                    "<input type='number' value='"+d.quantity+"'></td>" +--}}
    {{--                    "<td>"+d.product.price*d.quantity+"</td>" +--}}
    {{--                    "</tr>";--}}
    {{--                console.log(d.product.product_name);--}}
    {{--                total+=d.product.price*d.quantity;--}}
    {{--            });--}}
    {{--            // console.log(total);--}}
    {{--            document.getElementById('cart_body').innerHTML=tb;--}}
    {{--            document.getElementById('total').innerHTML=" <td >Total</td><td>"+total+"</td>";--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}
    // onLoadCart();

</script>

</body>

</html>
