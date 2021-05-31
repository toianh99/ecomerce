<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;
    protected $fillable=['promotion_id','shipment_id','payment_id','fullName','phoneNumber','address','email','card_id','user_id','city','status'];
}
