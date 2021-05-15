<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Role extends  Model
{
    public $table = 'roles';
    public $guard_name = 'api';
    protected $fillable=['title','description'];

    public function isAdmin():bool
    {
        return $this->name === "admin";
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class);
    }


}
