<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Size;

class ImportDetail extends Model
{
    use HasFactory;
    protected $fillable=['import_id','product_id','size_id','color_id','quantity','purchase_price'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function import(){
        return $this->belongsTo(Import::class,'import_id');
    }

    public function color(){
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function size(){
        return $this->belongsTo(ProductSize::class,'size_id');
    }
}
