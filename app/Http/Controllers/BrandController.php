<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Gate;
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
//        $searchParams= $request->all();
//        //kiểm tra biết limit
//        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
//        //kiểm tra keyword search
//        $keyword=Arr::get($searchParams,'keyword','');
//        //gọi query product
//        $query=Brand::query();
//
//        if (!empty($keyword)) {
//            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
//        }
//        return BrandResource::collection($query->paginate($limmit));
        abort_if(Gate::denies('brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands= Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest  $request)
    {
        $brand= Brand::create($request->all());
        return redirect()->route('brand.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        abort_if(Gate::denies('brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.brand.edit',compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest  $request, Brand $brand)
    {
        $brand->update($request->all());
        return redirect()->route('brand.index');
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
