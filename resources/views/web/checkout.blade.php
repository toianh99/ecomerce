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
                <form action="#">
                    <div class="row">
                        <!-- Shipping-Address Start -->
                        <div class="col-6" style="width: 50%">
                            <div class="shipping-address margin-65">
                                <h2 class="title-3">shipping address</h2>
                                <div class="row">
                                    <div class="col-12" style="width: 100%">
                                        <select class="custom-select custom-form " style="width: 100%">
                                            <option>Select Delivery Method</option>
                                            <option>Hand to Hand</option>
                                            <option>Select Delivery Method</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="custom-form" type="text" placeholder="Subash" name="firstname"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="custom-form" type="text" placeholder="Chandra" name="lastname"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="custom-form" placeholder="Address" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select class="custom-select custom-form">
                                            <option>City</option>
                                            <option>Dhaka</option>
                                            <option>New York</option>
                                            <option>London</option>
                                            <option>Melbourne</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="custom-select custom-form">
                                            <option>Country</option>
                                            <option>Bangladesh</option>
                                            <option>United States</option>
                                            <option>United Kingdom</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="custom-form" type="text" placeholder="Phone Number" />
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="custom-select custom-form">
                                            <option>Post Code</option>
                                            <option>012345</option>
                                            <option>0123456</option>
                                            <option>01234567</option>
                                            <option>012345678</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="custom-form" placeholder="Email" name="email" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="custom-form" placeholder="Order Note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shipping-Address End -->
                        <div class="col-sm-6">
                            <div class="billing-address margin-65">
                                <h2 class="title-3">billing addrss</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="custom-form" placeholder="First Name" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="custom-form" placeholder="Last Name" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="custom-form" placeholder="Office Address" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="custom-form" placeholder="Home Address" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select class="custom-select custom-form">
                                            <option>City</option>
                                            <option>Dhaka</option>
                                            <option>New York</option>
                                            <option>London</option>
                                            <option>Melbourne</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="custom-select custom-form">
                                            <option>Country</option>
                                            <option>Bangladesh</option>
                                            <option>United States</option>
                                            <option>United Kingdom</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select class="custom-select custom-form">
                                            <option>Post Code</option>
                                            <option>012345</option>
                                            <option>0123456</option>
                                            <option>01234567</option>
                                            <option>012345678</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="custom-form" type="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="custom-form" placeholder="Cell Number" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="custom-form" placeholder="Phone Number" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="custom-form" placeholder="Email" name="email" />
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked" name="create-account"/>
                                        Create an account?
                                    </label>
                                    <label>
                                        <input type="checkbox" name="billing-address"/>
                                        Skip to billing address
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Enter-Payment Start -->
                        <div class="col-md-9 col-sm-7">
                            <div class="enter-payment margin-65">
                                <h2 class="title-3">Enter Payment</h2>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" class="custom-form" placeholder="Card Type" />
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="custom-form" placeholder="Card Number" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="custom-select custom-form">
                                                    <option>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="custom-select custom-form">
                                                    <option>Year</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <input type="text" class="custom-form" placeholder="Card Security Code" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="submit" class="custom-form custom-submit no-margin" value="pay now" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="custom-form custom-submit no-margin" value="cancel order" />
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="custom-form custom-submit no-margin" href="#">continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-5">
                            <div class="order margin-65">
                                <h2 class="title-3">Review your order</h2>
                                <div>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="text-left">Sub Total</td>
                                            <td class="text-right">$ 2750.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Packaging</td>
                                            <td class="text-right">$ 07.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Shipping</td>
                                            <td class="text-right">$ 13.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Discount off</td>
                                            <td class="text-right">$ 00.00</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td class="text-right custom-td"><strong>Total =</strong></td>
                                            <td class="text-right custom-td"><strong>$ 2770.00</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Enter-Payment End -->
                    </div>
                </form>
        <div class="brands-logo-area">
            <div class="container">
                <div class="row">
                    <div class="active-brands-logo">
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/1.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/2.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/3.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/4.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/5.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/6.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                        <!-- Single-Brand-Logo Start -->
                        <div class="col-md-12">
                            <div class="single-brand-logo">
                                <img src="img/brand/1.png" alt="" />
                            </div>
                        </div>
                        <!-- Single-Brand-Logo End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- BRANDS-LOGO-AREA END -->


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
