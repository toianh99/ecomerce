<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\CheckOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function save(Request $request){
        $params = $request->all();
        $params['status'] =1;
        $user_id = Auth::user()->id;
        $checkout = CheckOut::all()->where('status','=',0)->where('user_id','=',$user_id);
        foreach($checkout as $c){
            $c->update($params);

            $cart=Cart::all()->where('id','=',$c->card_id)->where('status','=',1);
            foreach($cart as $cc){
                $cc->update([
                    'status'=>2
                ]);
            }

            $cartsitems=CartDetail::all()->where('cart_id','=',$c->card_id);
            foreach($cartsitems as $ci){
                $ci->update([
                   'active'=>2
                ]);
            }
        }
        return redirect()->route('success');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::user()->id;
        CheckOut::create([
            'promotion_id'=>$request->promotion_id,
            'shipment_id'=>$request->shipment_id,
            'user_id'=>$user_id,
            'card_id'=>$request->cart_id
        ]);
        return response()->json(['success' =>'Thành Công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
