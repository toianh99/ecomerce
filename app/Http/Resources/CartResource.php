<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            "cart_id"=>$this->cart_id,
            'quantity'=>$this->quantity,
            'color'=>[
                'color'=>$this->color->id,
                'color_code'=>$this->color->code_color
            ],
            'size'=>[
                'size_id'=>$this->size->id,
                'size_code'=>$this->size->code_size
            ],
            'product'=>[
                'product_id'=>$this->product->id,
                'product_name'=>$this->product->name_product,
                'image_default'=>$this->product->default_image,
                'price'=>$this->product->price
            ]
        ];
    }
}
