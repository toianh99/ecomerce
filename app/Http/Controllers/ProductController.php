<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product as Products;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    const ITEM_PER_PAGE = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchParams= $request->all();
        //kiểm tra biết limit
        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
        //kiểm tra keyword search
        $keyword=Arr::get($searchParams,'keyword','');
        //gọi query product
        $query=Products::query();

        if (!empty($keyword)) {
            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
        }
        return  ProductResource::collection($query->paginate($limmit));
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
        $validator = Validator::make(
            $request->all(),
            [
                'name_product' => ['required'],
                'price'=>['required'],
                'sale_price'=>['required'],

            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params = $request->all();
            $product= Product::create([
                'name_product'=>$params['name_product'],
                'price'=>$params['price'],
                'sale_price'=>$params['sale_price'],
                'brand_id'=>$params['brand_id'],
                'category_id'=>$params['category_id'],
                'default_image'=>$params['default_image'],
                'image1'=>$params['image1'],
                'image2'=>$params['image2'],
                'image3'=>$params['image3'],
                'image4'=>$params['image4'],
                'overview'=>$params['overview'],
                'description'=>$params['description'],
                'status'=>1
            ]);
            return new ProductResource($product);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(new JsonResource(Product::where('id',$id)->first()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name_product' => ['required'],
                'price'=>['required'],
                'sale_price'=>['required'],

            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params = $request->all();
               $product->name_product=$params['name_product'];
                $product->price=$params['price'];
                $product->sale_price=$params['sale_price'];
                $product->brand_id=$params['brand_id'];
                $product->category_id=$params['category_id'];
                $product->default_image=$params['default_image'];
                $product->image1=$params['image1'];
                $product->image2=$params['image2'];
                $product->image3=$params['image3'];
                $product->image4=$params['image4'];
                $product->overview=$params['overview'];
                $product->description=$params['description'];
                $product->status=1;
                $product->save();
            return response()->json(new JsonResponse($product));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->status=0;
            $time =date('Y-m-d H:i:s');
            $product->deleted_at=$time;
            $product->save();
            return response()->json(['succuess'=>'xóa thành công'],200);
        } catch (\Exception $ex) {
            response()->json(['error' => $ex->getMessage()], 403);
        }
    }
}
