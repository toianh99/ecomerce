<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImportDetailResource;
use App\Models\ImportDetail;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ImportDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(ImportDetailResource::collection(ImportDetail::all()->where('import_id','=','0')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request)
    {

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
        $input['import_id']=0;
        ImportDetail::create($input);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImportDetail  $importDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ImportDetail $importDetail)
    {
//        $importDetail1 = ImportDetail::all()->where('id','=',$importDetail);
//        print_r($importDetail);
//        die();
        return response()->json($importDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImportDetail  $importDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportDetail $importDetail)
    {
        //
    }

    public function updateID(Request $request){
        $res= $request->all()['ids'];
        foreach ($res as $r){
            $r->
            $r->save();
        }
       return response()->json(["success"=>"Thành công"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImportDetail  $importDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportDetail $importDetail)
    {
        $importDetail->update($request->all());
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImportDetail  $importDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImportDetail $importDetail)
    {
        try {
            $importDetail->delete();
            return response()->json(['success'=>'Got Simple Ajax Request.']);
        }catch (Exception $err){
            return response()->json(['error'=>'eror']);
        }

    }
}
