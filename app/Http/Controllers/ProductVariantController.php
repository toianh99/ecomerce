<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductVariantRequest;
use App\Http\Requests\UpdateProductVariantRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_variant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $productVariants=ProductVariant::all();
        return view('admin.productvariant.index',compact('productVariants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_variant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products=Product::all();
        $colors=ProductColor::all();
        $sizes=ProductSize::all();
//        print_r($sizes);
//        die();
        return view('admin.productvariant.create',compact('products','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductVariantRequest $request)
    {
        $productVariant=ProductVariant::create($request->all());
        return redirect()->route('product-variant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $productVariant)
    {
        abort_if(Gate::denies('product_variant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.productvariant.show',compact('productVariant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariant $productVariant)
    {
        abort_if(Gate::denies('product_variant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products=Product::all()->where('id','!=',2);
        $colors=ProductColor::all();
        $sizes=ProductSize::all();
        return view('admin.productvariant.edit',compact('productVariant','products','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVariantRequest $request, ProductVariant $productVariant)
    {
        $productVariant->update($request->all());
        return redirect()->route('product-variant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $productVariant)
    {
        //
    }
}
