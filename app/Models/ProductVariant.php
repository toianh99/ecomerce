<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable=['id_product','id_product_size','id_product_color','quantity'];

    public function product(){
        return $this->belongsTo(Product::class,'id_product');
    }
    public function size(){
        return $this->belongsTo(ProductSize::class,'id_product_size');
    }
    public function color(){
        return $this->belongsTo(ProductColor::class,'id_product_size');
    }
}
