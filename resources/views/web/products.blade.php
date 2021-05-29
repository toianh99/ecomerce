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


<div class="small-container">

    <div class="row row-2">
        <h2>All Products</h2>
        <select>
            <option>Default Shop</option>
            <option>Short by price</option>
            <option>Short by popularity</option>
            <option>Short by Rating</option>
            <option>Short by Sale</option>
        </select>
    </div>

    <div id="products" class="row d-flex" style="flex-wrap: wrap;justify-content: flex-start">
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
    // onLoad();
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



    function onLoad() {
        var tb='';
        $.ajax({
            type: 'GET',
            url: "{{route('api-product.index')}}?page=0&limit=12",
            success: function (data) {
                console.log(data);
                data.data.forEach(d => {
                    console.log(d);
                    tb += '<div class="col-4"><a href="{{route('api-product.index')}}/'+d.id+'" ><img src="' + d.default_image + '"><h4>' + d.name_product + '</h4><div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i>' +
                        '</div> <p>'+ parseInt(d.price, 10)+'</p> </a></div>';
                    // console.log(d.quantity);
                    // tb+='<tr>';
                    // tb+='<td>'+d.id+'</td>';
                    // tb+='<td>'+d.product+'</td>';
                    // tb+='<td>'+d.size+'</td>';
                    // tb+='<td>'+d.color+'</td>';
                    // tb+='<td>'+d.quantity+'</td>';
                    // tb+='<td>'+d.purchase_price+'</td>';
                    // tb+="<td><input type='button' value='edit' class=\" m-1 btn btn-xs btn-info\" onclick='onEdit("+d.id+")'><input type='button' value='Delete' class=\"btn btn-xs btn-danger\" onclick='onDelete("+d.id+")'></td>";
                    // tb+='</tr>';
                });
                document.getElementById('products').innerHTML = tb;
            }
        });
    }
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
