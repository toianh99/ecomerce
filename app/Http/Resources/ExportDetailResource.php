<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExportDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'product'=>$this->product->name_product,
            'size'=>$this->size->code_size,
            'color'=>$this->color->code_color,
            'quantity'=>$this->quantity,
            'sale_price'=>$this->sale_price,
        ];
    }
}
