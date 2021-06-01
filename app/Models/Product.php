<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name_product','description','price','sale_price','brand_id','category_id','default_image','status','delete_at','overview','image1','image2','image3','image4'];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }
}
