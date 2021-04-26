<?php

namespace App\Models;

use App\Laravue\Models\Districts;
use App\Laravue\Models\Provinces;
use App\Laravue\Models\Wards;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table="addresses";
    use HasFactory;
    protected $fillable=['id_province','id_district','id_ward','street'];
    public function getId(){
        return $this->getAttribute('id');
    }
    public function district()
    {
        return $this->belongsTo(Districts::class);
    }
    public function province()
    {
        return $this->belongsTo(Provinces::class);
    }
    public function ward()
    {
        return $this->belongsTo(Wards::class);
    }
}
