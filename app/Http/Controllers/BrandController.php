<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const ITEM_PER_PAGE =15;

    public function index(Request  $request)
    {
        $searchParams= $request->all();
        //kiểm tra biết limit
        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
        //kiểm tra keyword search
        $keyword=Arr::get($searchParams,'keyword','');
        //gọi query product
        $query=Brand::query();

        if (!empty($keyword)) {
            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
        }
        return BrandResource::collection($query->paginate($limmit));
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
    public function store(Request  $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name_brand' => ['required'],
                'description'=>['required']
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params=$request->all();
            $brand=Brand::create([
                'name_brand'=>$params['name_brand'],
                'description'=>$params['description'],
            ]);
            return response()->json(new JsonResponse($brand));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(new JsonResponse(Brand::where('id',$id)->first()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name_brand' => ['required'],
                'description'=>['required']
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params=$request->all();
            $brand->name_brand=$params['name_brand'];
            $brand->description=$params['description'];
            $brand->save();
            return response()->json(new JsonResponse($brand));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            return  response()->json(['success'=>'xóa thành công'],200);
        }
        catch (\Exception $ex){
            return response()->json(['error'=>$ex->getMessage(),403]);
        }
    }
}
