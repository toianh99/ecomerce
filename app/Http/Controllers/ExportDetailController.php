<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExportDetailResource;
use App\Models\ExportDetail;
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
