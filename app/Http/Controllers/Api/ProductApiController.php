<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    const ITEM_PER_PAGE =8;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $searchParams= $request->all();
        //kiểm tra biết limit
        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
        //kiểm tra keyword search
        $keyword=Arr::get($searchParams,'keyword','');
        //gọi query product
        $query=Product::query();

        if (!empty($keyword)) {
            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
        }
        $products=$query->paginate($limmit);
        return view('web.products',compact('products'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $param = $request->all();
        $id=$param['id'];
        $product=ProductResource::collection(Product::all()->where('id','=',$id));
        $searchParams= $request->all();
        //kiểm tra biết limit
        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
        //kiểm tra keyword search
        $keyword=Arr::get($searchParams,'keyword','');
        //gọi query product
        $query=Product::query();

        if (!empty($keyword)) {
            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
        }
        $product_variant=ProductVariant::all()->where('id_product','=',$id);
        $products=$query->paginate($limmit);
        $products->appends(['id'=>$id]);
//        print_r($product);
//        die();
        return view('web.product_detail',compact('product','products','product_variant'));
    }

    public function detail(Request  $request){
        $param = $request->all();
        $id=$param['id'];
        $product=DB::table('products')->where('id',$id)->get();
        return view('web.product_detail',compact('product'));
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
