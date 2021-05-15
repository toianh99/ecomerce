<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable=['name_product_size','description_product_size','code_size'];
    public $timestamps=false;
    use HasFactory;
}
