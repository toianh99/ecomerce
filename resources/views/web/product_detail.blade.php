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

<!-- ----- commnet------------- -->
<div class="row">
<section class="content-item" style="width:50%" id="comments">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                @if(Auth::check())

                    <h3 class="pull-left">New Comment</h3>
                <br>



{{--                            <div class="col-sm-3 col-lg-2 hidden-xs" style="height:50px">--}}
{{--                                <img class="img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" style="height: 100%">--}}
{{--                            </div>--}}
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea id="content" class="form-control" id="message" placeholder="Your message" required="" rows="6" cols="50" style="margin-left: 10px; outline:none" ></textarea>
                            </div>

                    <input onclick="test()" id="comment"  type="button" class="btn btn-tla pull-right" value="Bình Luận"/>
                    <script>
                        function test() {
                                var user_id ={{Auth::user()->id}};
                                var product_id=document.getElementById('product_id').value;
                                var content =document.getElementById('content').value;
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                                $.ajax({
                                    type:'POST',
                                    url:"{{route('comment.store')}}",
                                    data:{
                                        user_id:user_id,
                                        product_id:product_id,
                                        content:content,
                                    },
                                    success:function (data) {
                                        document.getElementById('content').value = '';
                                        onLoadComment();
                                    }
                                });

                        }
                        function onLoadComment() {

                        }
                    </script>

                @else
                    <a style="color:red" href="{{route('web.login')}}">Đăng nhâp để bình luận</a>


                @endif




                @foreach($comment as $c)
                <h3>4 Comments</h3>

                <!-- COMMENT 1 - START -->
                <div class="media">
                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$c->user->name}}</h4>
                        <p>{{$c->content}}</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>{{$c->created_at}}</li>
{{--                            <li><i class="fa fa-thumbs-up"></i>13</li>--}}
                        </ul>
                    </div>
                </div>
                    <br>

                    @endforeach
                {{$comment->links()}}
                <!-- COMMENT 1 - END -->

                <!-- COMMENT 2 - START -->
{{--                <div class="media">--}}
{{--                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""></a>--}}
{{--                    <div class="media-body">--}}
{{--                        <h4 class="media-heading">John Doe</h4>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                        <ul class="list-unstyled list-inline media-detail pull-left">--}}
{{--                            <li><i class="fa fa-calendar"></i>27/02/2014</li>--}}
{{--                            <li><i class="fa fa-thumbs-up"></i>13</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="list-unstyled list-inline media-detail pull-right">--}}
{{--                            <li class=""><a href="">Like</a></li>--}}
{{--                            <li class=""><a href="">Reply</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- COMMENT 2 - END -->--}}

{{--                <!-- COMMENT 3 - START -->--}}
{{--                <div class="media">--}}
{{--                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></a>--}}
{{--                    <div class="media-body">--}}
{{--                        <h4 class="media-heading">John Doe</h4>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                        <ul class="list-unstyled list-inline media-detail pull-left">--}}
{{--                            <li><i class="fa fa-calendar"></i>27/02/2014</li>--}}
{{--                            <li><i class="fa fa-thumbs-up"></i>13</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="list-unstyled list-inline media-detail pull-right">--}}
{{--                            <li class=""><a href="">Like</a></li>--}}
{{--                            <li class=""><a href="">Reply</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- COMMENT 3 - END -->

                <!-- COMMENT 4 - START -->
{{--                <div class="media">--}}
{{--                    <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt=""></a>--}}
{{--                    <div class="media-body">--}}
{{--                        <h4 class="media-heading">John Doe</h4>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                        <ul class="list-unstyled list-inline media-detail pull-left">--}}
{{--                            <li><i class="fa fa-calendar"></i>27/02/2014</li>--}}
{{--                            <li><i class="fa fa-thumbs-up"></i>13</li>--}}
{{--                        </ul>--}}
{{--                        <ul class="list-unstyled list-inline media-detail pull-right">--}}
{{--                            <li class=""><a href="">Like</a></li>--}}
{{--                            <li class=""><a href="">Reply</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- COMMENT 4 - END -->

            </div>
        </div>
    </div>
</section>
</div>
{{--css comment--}}

<style>
    .content-item {
        padding:30px 0;
        background-color:#FFFFFF;
    }

    .content-item.grey {
        background-color:#F0F0F0;
        padding:50px 0;
        height:100%;
    }

    .content-item h2 {
        font-weight:700;
        font-size:35px;
        line-height:45px;
        text-transform:uppercase;
        margin:20px 0;
    }

    .content-item h3 {
        font-weight:400;
        font-size:20px;
        color:#555555;
        margin:10px 0 15px;
        padding:0;
    }

    .content-headline {
        height:1px;
        text-align:center;
        margin:20px 0 70px;
    }

    .content-headline h2 {
        background-color:#FFFFFF;
        display:inline-block;
        margin:-20px auto 0;
        padding:0 20px;
    }

    .grey .content-headline h2 {
        background-color:#F0F0F0;
    }

    .content-headline h3 {
        font-size:14px;
        color:#AAAAAA;
        display:block;
    }


    #comments {
        box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
        background-color:#FFFFFF;
    }

    #comments form {
        margin-bottom:30px;
    }

    #comments .btn {
        margin-top:7px;
    }

    #comments form fieldset {
        clear:both;
    }

    #comments form textarea {
        height:100px;
    }

    #comments .media {
        border-top:1px dashed #DDDDDD;
        padding:20px 0;
        margin:0;
    }

    #comments .media > .pull-left {
        margin-right:20px;
    }

    #comments .media img {
        max-width:100px;
    }

    #comments .media h4 {
        margin:0 0 10px;
    }

    #comments .media h4 span {
        font-size:14px;
        float:right;
        color:#999999;
    }

    #comments .media p {
        margin-bottom:15px;
        text-align:justify;
    }

    #comments .media-detail {
        margin:0;
    }

    #comments .media-detail li {
        color:#AAAAAA;
        font-size:12px;
        padding-right: 10px;
        font-weight:600;
    }

    #comments .media-detail a:hover {
        text-decoration:underline;
    }

    #comments .media-detail li:last-child {
        padding-right:0;
    }

    #comments .media-detail li i {
        color:#666666;
        font-size:15px;
        margin-right:10px;
    }
</style>



<!-- ----- title------------- -->
<div class="small-container">

    <div class="row row2">
        <h2>Relate Products</h2>
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
