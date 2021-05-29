<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','total'];

    public function cartDetail(){
        return $this->hasMany(CartDetail::class,'cart_id','id');
    }

}
