<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['user_id','total','status','promotion_id','shipment_id'];
    public function cartDetail(){
        return $this->hasMany(CartDetail::class,'cart_id','id');
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class,'promotion_id');
    }

    public function shipment(){
        return $this->belongsTo(Shipment::class,'shipment_id');
    }

}
