<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    const ITEM_PER_PAGE = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchParams= $request->all();
        //kiểm tra biết limit
        $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
        //kiểm tra keyword search
        $keyword=Arr::get($searchParams,'keyword','');
        //gọi query product
        $query=Category::query();

        if (!empty($keyword)) {
            $query->where('name_product', 'LIKE', '%' . $keyword . '%');
        }
        return CategoryResource::collection($query->paginate($limmit));
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
                'name_category' => ['required'],
                'description'=>['required']

            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $params=$request->all();
            $category=Category::create([
                'name_category'=>$params['name_category'],
                'description'=>$params['description']
            ]);

            return new CategoryResource($category);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  response()->json(new JsonResponse(Category::where('id',$id)->first()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name_category' => ['required'],
                'description'=>['required']
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
                $params=$request->all();
                $category->name_category=$params['name_category'];
                $category->description=$params['description'];
                $category->save();
                return response()->json(new JsonResponse($category));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return  response()->json(['success'=>'xóa thành công'],200);
        }
        catch (\Exception $ex){
            return response()->json(['error'=>$ex->getMessage(),403]);
        }
    }
}
