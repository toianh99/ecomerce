<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductColorRequest;
use App\Http\Requests\StoreProductColorRequest;
use App\Http\Requests\UpdateProductColorRequest;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product_color=ProductColor::all();
        return view('admin.productcolor.index',compact('product_color'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_color_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.productcolor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductColorRequest $request)
    {
        $product_color=ProductColor::create($request->all());
        return redirect()->route('product-color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function show(ProductColor $productColor)
    {
        abort_if(Gate::denies('product_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productcolor.show', compact('productColor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductColor $productColor)
    {
        abort_if(Gate::denies('product_color_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.productcolor.edit',compact('productColor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductColorRequest $request
     * @param \App\Models\ProductColor $productColor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductColorRequest $request, ProductColor $productColor)
    {
        $productColor->update($request->all());
        return redirect()->route('product-color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductColor  $productColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductColor $productColor)
    {
        //
    }
}
