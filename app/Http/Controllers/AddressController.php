<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddressResource::collection(Address::all());
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
                'street' => ['required'],
                'id_province'=>['required'],
                'id_district'=>['required'],
                'id_ward'=>['required']
            ]

        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params=$request->all();
            $address=Address::create([
                'street'=>$params['street'],
                'id_province'=>$params['id_province'],
                'id_district'=>$params['id_district'],
                'id_ward'=>$params['id_ward'],
            ]);
            return response()->json(new JsonResponse($address));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(new JsonResponse(Address::where('id',$id)->first()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'street' => ['required'],
                'id_province'=>['required'],
                'id_district'=>['required'],
                'id_ward'=>['required']
            ]

        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params=$request->all();
            $address->street=$params['street'];
            $address->id_province=$params['id_province'];
            $address->id_district=$params['id_district'];
            $address->id_ward=$params['id_ward'];
            $address->save();
            return response()->json(new JsonResponse($address));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        try {
            $address->delete();
            return  response()->json(['success'=>'xóa thành công'],200);
        }
        catch (\Exception $ex){
            return response()->json(['error'=>$ex->getMessage(),403]);
        }
    }
}
