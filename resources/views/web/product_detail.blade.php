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
            <a href="cart.html"><img src="{{asset('storage/photos/1/cart/60a8773387b3b.png')}}" width="30px" height="30px"></a>
            <div>
                <span id="count_cart"></span>
            </div>
            <img src="images/menu.png" class="menu-icon"
                 onclick="menutoggle()">
        </div>

    </div>
</div>

<!-- ---------- single Products detail ----------- -->

<div class="small-container single-product">
    <div class="row">
        @foreach($product as $object)
        <div class="col-2">
            <img src="{{$object->image1}}" width="100%" id="productImg">

            <div class="small-img-row">
                <div class="small-img-rol">
                    <img src="{{$object->image1}}" width="100%" class="small-img">
                </div>
                <div class="small-img-rol">
                    <img src="{{$object->image2}}" width="100%" class="small-img">
                </div>
                <div class="small-img-rol">
                    <img src="{{$object->image3}}" width="100%" class="small-img">
                </div>
                <div class="small-img-rol">
                    <img src="{{$object->image4}}" width="100%" class="small-img">
                </div>
            </div>

        </div>
        <div class="col-2">
    {{--            {{print_r($product)}}--}}
    {{--            {{die()}}--}}
            <p>Home /{{$object->category->name_category}}</p>
            <h1>{{$object->name_product}}</h1>
            <h4>{{(int)($object->price)}} VNĐ</h4>
            <form>
                <label>Chọn size</label>
                <label for="size_id"></label><select id="size_id" name="size_id" style="margin-bottom: 2rem">
                @foreach($product_variant as $size)
                <option value="{{$size->size->id}}">{{$size->size->code_size}}</option>
                @endforeach
            </select>
                <label>Chọn Màu</label>
                <select name="color_id" id="color_id" style="margin-bottom: 2rem">
                    @foreach($product_variant as $color)
                        <option value="{{$color->color->id}}">{{$color->color->code_color}}</option>
                    @endforeach
                </select>
                <label>Chọn Số Lượng</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" style="margin-bottom: 2rem"><br>
                    <input type="hidden" id="product_id" name="product_id" value="{{$object->id}}">
{{--                    <input type="hidden" name="size_id" value="{{$object->id}}">--}}
{{--                    <input type="hidden" name="color_id" value="{{$object->id}}">--}}
                    <button type="button" id="add_to_cart"  class=" btn-tla " style="background: rgb(230 132 10); color: white">Thêm Vào Giỏ Hàng</button>
                    <button type="button" id="check_in" onclick="check_in()" class=" btn-tla" style="background: tomato; color: white">Mua Luôn</button>
            </form>

                <h3 style="margin-top: 3rem">Product Detail
                    <i class="fa fa-indent"></i>
                </h3>
                <br>
                <p>{{$object->overview}}</p>
            @endforeach
        </div>
    </div>
</div>

<!-- ----- title------------- -->
<div class="small-container">
    <div class="row row2">
        <h2>Relate Products</h2>
        <p>View More</p>
    </div>
</div>

<!-- ---------------Products----------------- -->
<div class="small-container">

    <div class="row d-flex" style="flex-wrap: wrap;justify-content: flex-start">

            @foreach($products as $product)
            <div class="col-4">
                {{--            {{print_r($product)}}--}}
                {{--            {{die()}}--}}
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
        {{ $products->links() }}
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

    </script>

    <!-- ------------------- JS for  product gallery------------------------         -->
    <script>
        var ProductImg = document.getElementById("productImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function()
        {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function()
        {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function()
        {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function()
        {
            ProductImg.src = SmallImg[3].src;
        }

    </script>

    {{--JS add to cart--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add_to_cart').click(  function (){
            var size_id = document.getElementById('size_id').value;
            var color_id= document.getElementById('color_id').value;
            var quantity=document.getElementById('quantity').value;
            var product_id=document.getElementById('product_id').value;
            console.log(quantity);
                $.ajax({
                    type:'POST',
                    url:"{{route('cartDetail.store')}}",
                    data:{
                        size_id:size_id,
                        product_id:product_id,
                        color_id:color_id,
                        quantity:quantity,
                    },
                    success:function (data) {
                        if (data.fail){
                            window.location.replace("{{route('web.login.index')}}");
                        }else if (data.success){
                            onLoadCart();
                        }
                    }
                });
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
