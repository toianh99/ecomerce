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
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody id="cart_body">
        </tbody>
    </table>

    <div class="total-price">
        <table>
            <tr id="total">


            </tr>
        </table>

    </div>
    <div class="d-flex">
        <div style="margin-left: auto">
            <a href="{{route('check-out.index')}}" class="btn btn-danger" style="margin-left: auto">Thanh Toán</a>
        </div>
    </div>


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
        function onLoadCart(){
            var total=0;
            $.ajax({
                type:'GET',
                url:"{{route('cartDetail.index')}}",
                success:function (data) {
                    console.log(data);
                    var tb="";
                    data.forEach(d=>{
                        tb+="<tr>" +
                            "<td>" +
                            "<div class='cart-info'><img src='"+d.product.image_default+"'><div>" +
                        "<p>"+d.product.product_name+"</p>" +
                            "<small>Price: "+d.product.price+"</small><br>" +
                            "<a href=''>Remove</a>" +
                        "</div>" +
                        "</div>" +
                        "<td>" +
                        "<input type='number' value='"+d.quantity+"'></td>" +
                        "<td>"+d.product.price*d.quantity+"</td>" +
                        "</tr>";
                        console.log(d.product.product_name);
                        total+=d.product.price*d.quantity;
                    });
                    // console.log(total);
                    document.getElementById('cart_body').innerHTML=tb;
                    document.getElementById('total').innerHTML=" <td >Total</td><td>"+total+"</td>";
                }
            });
        }
        onLoadCart();

    </script>

</body>

</html>
