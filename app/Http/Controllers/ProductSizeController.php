<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Models\ProductSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_size_access'),Response::HTTP_FORBIDDEN, '403 Forbidden');
        $productSize=ProductSize::all();
        return view('admin.productsize.index',compact('productSize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_size_create'),Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.productsize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSizeRequest $request)
    {
        $productSize=ProductSize::create($request->all());
        return redirect()->route('product-size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_show'),Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.productsize.show',compact('productSize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.productsize.edit',compact('productSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        $productSize->update($request->all());
        return  redirect()->route('product-size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSize  $productSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSize $productSize)
    {
        //
    }
}
