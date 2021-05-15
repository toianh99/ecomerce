<?php

namespace App\Models;



use App\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permissions';
    protected $fillable=['title','description'];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
