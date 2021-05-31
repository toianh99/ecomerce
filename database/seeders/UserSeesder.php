<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeesder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'id' => '1',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$o/Xq69YOWnSx7L3M5ZwNWel/BFR1nvAkobsE5QMcKKh8x87/dvQfS',
                'remember_token'        =>null,
            ]
        ];

        User::insert($users);

    }
}
