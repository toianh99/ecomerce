<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\ImportDetail;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authen('import_access');
        $imports= Import::all();

        return view('admin.import.index',compact('imports',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authen('import_access');
        $importDetails=ImportDetail::all();
        $suppliers=Supplier::all();
        $products=Product::all();
        $colors=ProductColor::all();
        $sizes=ProductSize::all();
        return view('admin.import.create',compact('suppliers','products','sizes','colors','importDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authen('import_create');
        $user_id = Auth::user()->id;
        $status=1;
        $req = $request->all();
        $res['user_id']=$user_id;
        $res['status']=$status;
//        $importDeatils=$req['ids'];
//        foreach ($importDeatils as $importDeatil){
//            $importDeatil['import_id']=
//        }
//        $importDeatils;
        $import =Import::create([
            'user_id'=>$user_id,
            'status'=>$status,
            'supplier_id'=>$req['supplier_id'],
            'import_date'=>$req['import_date']
        ]);
        return response()->json($import);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        //
    }
}
