<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @author Toileanh
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

//        return parent::toArray($request);
        return [
            'idProduct'=> $this->id,
            'nameProduct'=>$this->name_product,
            'description'=>$this->description,
            'price'=>$this->price,
            'sale_pice'=>$this->sale_price,
            'default_image'=>$this->default_image,
            'image1'=>$this->image1,
            'image2'=>$this->image2,
            'image3'=>$this->image3,
            'image4'=>$this->image4,
            'status'=>$this->status,

            'brand'=> [
                "id_brand"=> $this->brand->id,
                "name_brand"=>$this->brand->name_brand,
            ],
            'category'=>[
                "id_category"=>$this->category->id,
                "name_category"=>$this->category->name_category,
            ]
        ];
    }


}
