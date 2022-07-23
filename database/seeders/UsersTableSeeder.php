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
            'phone'=>'0548404996',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'=>'Abdullah Saber',
            'email'=>'asaber0016@stu.kau.edu.sa',
            'phone'=>'0549819831',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'=>'writer',
            'email'=>'writer@gmail.com',
            'phone'=>'0500000000',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('writer');

    }
}
