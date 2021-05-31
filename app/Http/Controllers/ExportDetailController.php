<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExportDetailResource;
use App\Models\ExportDetail;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ExportDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authen('export_access');
        return response()->json(ExportDetailResource::collection(ExportDetail::all()->where('export_id','=',0)));
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
        $input = request()->all();
        $product_id=$input['product_id'];
        $size_id=$input['size_id'];
        $color_id=$input['color_id'];

        $product_variant=ProductVariant::all()->where('id_product','=',$product_id)->where('id_product_size','=',$size_id)->where('id_product_color','=',$color_id);
        if (isset($product_variant)){
            $quantity=0;
            foreach($product_variant as $p){
                $quantity=$p['quantity']-$input['quantity'];
                $p->update([
                    'quantity' =>$quantity
                ]);
            }
            if ($quantity==0){
                ProductVariant::create([
                    'id_product'=>$input['product_id'],
                    'id_product_color'=>$input['color_id'],
                    'id_product_size'=>$input['size_id'],
                    'quantity'=>$input['quantity']
                ]);
            }

        }
        $input['export_id']=0;
        ExportDetail::create($input);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExportDetail  $exportDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ExportDetail $exportDetail)
    {
        return response()->json($exportDetail);
    }

    public function updateID(Request $request){
        $res= $request->all();
        $id=$res['id'];
        $importDetails=ExportDetail::all()->where('import_id','=',0);
        foreach ($importDetails as $r){
            $r->export_id=$id;
            $r->save();
        }
        return response()->json(["success"=>"Thành công"]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExportDetail  $exportDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ExportDetail $exportDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExportDetail  $exportDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExportDetail $exportDetail)
    {
        $exportDetail->update($request->all());
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExportDetail  $exportDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExportDetail $exportDetail)
    {
        try {
            $exportDetail->delete();
            return response()->json(['success'=>'Got Simple Ajax Request.']);
        }catch (Exception $err){
            return response()->json(['error'=>'eror']);
        }
    }
}
