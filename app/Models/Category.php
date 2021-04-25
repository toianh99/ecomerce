<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name_category','description'];

    public function getId(){
        return $this->getAttribute('id');
    }
}
