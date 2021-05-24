<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\ExportDetail;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function index()
    {
        $this->authen('export_access');
        $exports= Export::all();
        return view('admin.export.index',compact('exports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authen('export_access');
        $importDetails=ExportDetail::all();
        $suppliers=Supplier::all();
        $products=Product::all();
        $colors=ProductColor::all();
        $sizes=ProductSize::all();
        return view('admin.export.create',compact('suppliers','products','sizes','colors','importDetails'));
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
    public function show(Export $import)
    {
        $this->authen('import_show');
        $importDetails=ExportDetail::all()->where('import_id','=',$import->id);
        return view('admin.import.show',compact('importDetails','import'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Export $import)
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
    public function update(Request $request, Export $import)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Export $import)
    {
        try {
            $import->delete();
            return redirect()->route('import.index');
        }catch (Exception $e){
            return response()->json(['exception'=>'LỖi']);
        }
    }
}
