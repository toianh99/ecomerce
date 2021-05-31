<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\CartDetail;
use App\Models\CheckOut;
use App\Models\Order;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Gate;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('order_access'), \Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN, '403 Forbidden');
        $orders = CheckOut::all();
        return view('admin.order.index',compact('orders'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(CheckOut $order)
    {
        $this->authen('order_show');
        $cartItem = CartDetail::all()->where('cart_id','=',$order->card_id);
        $sum=0;
        foreach($cartItem as $c){
            $sum+=$c->product->price*$c->quantity;
        }
        $sum=$sum*(100-$order->promotion->discount);
//        print_r($cartItem);
//        die();
        return view('admin.order.show',compact('order','cartItem','sum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckOut $order)
    {
        $order->update([
            'status' =>5
        ]);
        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckOut $order)
    {
        $order->update([
            'status' =>5
        ]);
        return redirect()->back();
    }
}
