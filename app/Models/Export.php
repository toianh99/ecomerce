<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $fillable=['supplier_id','user_id','export_date','status'];
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function exports(){
        return $this->hasMany(ExportDetail::class,'export_id','id');
    }
}
