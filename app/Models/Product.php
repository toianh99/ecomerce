<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name_product','description','price','sale_price','brand_id','category_id','default_image','image1','image2','image3','image4','overview','status','delete_at'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
