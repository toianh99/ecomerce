<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId=Auth::id();
        $cart=Cart::all()->where('user_id','=',$userId)->where('status','=',1);
        foreach ($cart as $c){
            $cartDetails=CartDetail::all()->where('cart_id','=',$c->id);
        }
        return isset($cartDetails) ? response()->json(CartResource::collection($cartDetails)) : response()->json([]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function updateQuantity(Request $request){
       $cartDetails = CartDetail::all()->where('id','=',$request->id);
        foreach ($cartDetails as $p){
            $p->quantity = $request->quantity;
            $p->save();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        $product=Product::query()->find($param['product_id']);
        if (Auth::id()!=null){
            try {
                $c = Cart::all()->where('user_id','=',Auth::id())->where('status','=',1)->first();
            } catch (\Exception $e){

            }
            $flat=false;
            if (isset($c)){
                $cartDetails=CartDetail::all()->where('cart_id','=',$c->id);
                foreach ($cartDetails as $s){
                    if ($s->product_id==$param['product_id']&&$s->size_id==$param['size_id']&&$s->color_id==$param['color_id']){
                        $s->quantity+=$param['quantity'];
                        $s->save();
                        $flat=true;
                    }
                }
            if ($flat==false){
                    $cartDetail=CartDetail::create([
                        'cart_id'=>$c->id,
                        'color_id'=>$param['color_id'],
                        'size_id'=>$param['size_id'],
                        'product_id'=>$param['product_id'],
                        'quantity'=>$param['quantity'],
                        'price' =>$product->price,
                        'discount'=>1,
                        'active'=>1
                    ]);
                }

            }else{
                $cart= Cart::create([
                    'user_id'=>Auth::id(),
                    'total'=>0,
                    'status'=>1
                ]);
                $cartDetail=CartDetail::create([
                    'cart_id'=>$cart->id,
                    'product_id'=>$param['product_id'],
                    'quantity'=>$param['quantity'],
                    'size_id'=>$param['size_id'],
                    'color_id'=>$param['color_id'],
                    'discount'=>1,
                    'price' =>$product->price,
                    'active'=>1
                ]);
            }


            return response()->json(['success'=>'Thêm sản phẩm giỏ hàng thành công']);
        }else{
            return response()->json(['fail'=>'thất bại']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartDetail $cartDetail)
    {
        return $cartDetail->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartDetail $cartDetail)
    {
        //
    }
}
