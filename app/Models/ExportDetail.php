<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExportDetail extends Model
{
    use HasFactory;
    protected $fillable=['export_id','product_id','size_id','color_id','quantity','sale_price'];

    public function export(){
        return $this->belongsTo(Export::class,'export_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function color(){
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function size(){
        return $this->belongsTo(ProductSize::class,'size_id');
    }
}
