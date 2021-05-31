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
        <div class="row">
            <div class="col-2">
                <h1>Give Your Workout<br> A New Style!</h1>
                <p>Success ins't always about greatness. It's about
                    consistency. Consistent <br>hard work gains success. Greatness
                    will come. </p>
                <a href="" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src="{{asset('storage/photos/1/home/slide.png')}}">
            </div>
        </div>
    </div>
</div>

<!-- ------------- featured categorries ---------------- -->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="images/category-1.jpg">
            </div>
            <div class="col-3">
                <img src="images/category-2.jpg">
            </div>
            <div class="col-3">
                <img src="images/category-3.jpg">
            </div>

        </div>
    </div>

</div>
<!-- ------------- featured products ---------------- -->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        @foreach($products as $product)
            {{--            {{print_r($product)}}--}}
            {{--            {{die()}}--}}
            <div class="col-4">
                <a href="{{route('product-detail')}}}?id={{$product->id}}">
                    <img src="{{$product->default_image}}">
                    <h4>{{$product->name_product}}</h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>{{$product->price}}</p>

            </div>
        @endforeach
    </div>
</div>
<!-- ------------ offer -------------- -->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2"><img src="images/exclusive.png" class="offer-img"> </div>
            <div class="col-2">
                <p>Exclusive Availabble on RedStore</p>
                <h1>Smart Band 4</h1>
                <small>
                    The Mi Smart Band 4 features a 39.9% larger (than Mi Band 4) AMOLED color full-touch display
                    with
                    adjustable brightness, so everything is clear as can be</small>
                <a href="" class="btn">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>
<!-- ------------ testimonial -------------- -->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-qoute-lef"></i>
                <p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased
                    imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness.
                    Removal request delight if on he we</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="images/user-1.png">
                <h3>Đạt 1 Phích</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-qoute-lef"></i>
                <p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased
                    imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness.
                    Removal request delight if on he we</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="images/user-2.png">
                <h3>An Nguyen</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-qoute-lef"></i>
                <p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased
                    imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness.
                    Removal request delight if on he we</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="images/user-3.png">
                <h3>Quang Hoang</h3>
            </div>
        </div>
    </div>
</div>
<!-- ------------------- brands --------------------- -->
<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="{{asset('storage/photos/1/brand/logo-godrej.png')}}">
            </div>
            <div class="col-5">
                <img src="{{asset('storage/photos/1/brand/logo-oppo.png')}}">
            </div>
            <div class="col-5">
                <img src="{{asset('storage/photos/1/brand/logo-coca-cola.png')}}">
            </div>
            <div class="col-5">
                <img src="{{asset('storage/photos/1/brand/logo-paypal.png')}}">
            </div>
            <div class="col-5">
                <img src="{{asset('storage/photos/1/brand/logo-philips.png')}}">
            </div>
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

    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px";
        }
        else
        {
            MenuItems.style.maxHeight = "0px";
        }
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function onLoadCart(){
        $.ajax({
            type:'GET',
            url:"{{route('cartDetail.index')}}",
            success:function (data) {
                console.log(data)
                document.getElementById('count_cart').innerText=data.length;
            }
        });
    }
    onLoadCart();

</script>
</body>
</html>
