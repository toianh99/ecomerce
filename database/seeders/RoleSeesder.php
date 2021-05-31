<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeesder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            'Admin',
            'User'
        ];
        foreach($roles as $role){
            Role::create([
                'title' =>$role,
                'description' =>''
            ]);
        }

    }
}
