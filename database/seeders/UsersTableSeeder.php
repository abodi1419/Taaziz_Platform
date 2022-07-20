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
            'name'=>'Abdullah Alzhrani',
            'email'=>'abodi.imz@gmail.com',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'=>'Abdullah Saber',
            'email'=>'asaber0016@stu.kau.edu.sa',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'=>'writer',
            'email'=>'writer@gmail.com',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('writer');

    }
}
