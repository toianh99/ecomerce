<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable=['name_product_color','description','code_color'];
    public $timestamps = false;
    public function getId()
    {
        return $this->getAttribute('id');
    }

    public function cartDetail(){
        return $this->hasMany(CartDetail::class,'color_id','id');
    }


}
