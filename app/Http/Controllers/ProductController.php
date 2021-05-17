<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product as Products;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class ProductController extends Controller
{
    const ITEM_PER_PAGE = 15;
    use MediaUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $searchParams= $request->all();
//        //kiểm tra biết limit
//        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
//        //kiểm tra keyword search
//        $keyword=Arr::get($searchParams,'keyword','');
//        //gọi query product
//        $query=Products::query();
//
//        if (!empty($keyword)) {
//            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
//        }
//        return  ProductResource::collection($query->paginate($limmit));
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients=ProductResource::collection(Product::all()->where('status','!=',2));
//        $clients = Product::all();
//        print_r($clients);
//        die();
        return view('admin.product.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories=Category::all();
        $brands=Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $params = $request->all();
////        $test=$params['default_image'];
//        print_r($params);
//        die();
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
                'description'=>$params['description'],
                'status'=>$params['status_id'],
                'overview'=>$params['overview'],
            ]);
            return redirect()->route('product.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        print_r($product);
//        die();
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories=Category::all();
        $brands=Brand::all();
       abort_if(Gate::denies('product_edit'),Response::HTTP_FORBIDDEN, '403 Forbidden');
       return view('admin.product.edit', compact('product','categories','brands'));
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
//                $product->image1=$params['image1'];
//                $product->image2=$params['image2'];
//                $product->image3=$params['image3'];
//                $product->image4=$params['image4'];
//                $product->overview=$params['overview'];
                $product->description=$params['description'];
            $product->status=$params['status_id'];
                $product->save();
            return redirect()->route('product.index');
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
            // status : 1 đang kinh doanh, 2 ngừng kinh doanh 3 tạm hết hàng
            $product->status=2;
//            $time =date('Y-m-d H:i:s');
//            $product->deleted_at=$time;
            $product->save();
            return redirect()->route('product.index');
        } catch (\Exception $ex) {
            response()->json(['error' => $ex->getMessage()], 403);
        }
    }
}
