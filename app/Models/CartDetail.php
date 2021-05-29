<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable=['price','cart_id','discount','quantity','color_id','size_id','product_id'];

    public function color(){
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function size(){
        return $this->belongsTo(ProductSize::class,'size_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

//    public function cart(){
//        return $this->hasMany(Cart::class,'cart_id');
//    }
}
