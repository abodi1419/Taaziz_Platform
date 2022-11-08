<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@taaziz.com',
            'phone'=>'0000000000',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('admin');




    }
}
