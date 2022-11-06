<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_student_register()
    {
        session_start();
        $this->withoutMiddleware();
        $user = [
            '_token' => csrf_token(),
            "_method" => "POST",
            'name' => 'test',
            'email' => 'test@stu.kau.edu.sa',
            'phone' => '0505050505',
            'password' => 'test-password',
            'password_confirmation' => 'test-password',
            'dob' => '1999-1-1',
            'sid' => '1234567',
            'graduation_date'=>'2020-1-1'
        ];
        $response = $this->post(route('student.store'),$user);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('users',['email'=>$user['email']]);
        session_abort();
    }

    function test_student_login(){
        session_start();
        $user = [
            "_token"=>csrf_token(),
            "_method"=>'POST',
            'email' => 'test@stu.kau.edu.sa',
            'password' => 'test-password',
        ];
        $response = $this->post('/login',$user);
        $response->assertRedirect('/home');
    }
}
