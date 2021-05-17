<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['name_brand','description'];
    public function getId(){
        return $this->getAttribute('id');
    }
    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
