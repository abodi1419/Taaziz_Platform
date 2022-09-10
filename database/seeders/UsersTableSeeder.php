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

        $user = User::create([
            'name'=>'Abdullah Alzhrani',
            'email'=>'aal0605@stu.kau.edu.sa',
            'phone'=>'0548404996',
            'password'=>bcrypt('asd12345'),
        ]);

        $student = $user->student()->create(
            [
                "sid" => "1850325",
                "dob" => "1999-03-31",
                "graduation_date" => "2023-01-01",
                "is_employed"=>'0',
            ]
        );
        $profile = $student->profile()->create(
            [
                'bio'=>'Abdullah is an IT major since 2019 who is very interested in web development specifically in backend development. Backend development looks like a very interesting game for me specially when I play with permissions and roles or applying security solutions to avoid unauthorized access.',
                'gpa'=>'4.43',
                'major'=>'Information Technology',
                'state'=>'1'
            ]
        );



        $user = User::create([
            'name'=>'Abdullah Saber',
            'email'=>'asaber0016@stu.kau.edu.sa',
            'phone'=>'0549819831',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->student()->create([
            "sid" => "1740893",
            "dob" => "1998-1-1",
            "graduation_date" => "2023-01-01",
            "is_employed"=>'0',
        ]);

        $user->assignRole('student');

        $user = User::create([
            'name'=>'writer',
            'email'=>'writer@gmail.com',
            'phone'=>'0500000000',
            'password'=>bcrypt('asd12345'),
        ]);
        $user->assignRole('writer');

    }
}
