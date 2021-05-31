<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;
    protected $fillable=['promotion_id','shipment_id','payment_id','fullName','phoneNumber','address','email','card_id','user_id','city','status',  ];

    public function promotion(){
        return $this->belongsTo(Promotion::class,'promotion_id');
    }

    public function shipment(){
        return $this->belongsTo(Shipment::class,'shipment_id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class,'cart_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function statushi(){
        return ($this->status==1) ?  "chờ xác nhận" : "đã xác nhận";
    }
}
