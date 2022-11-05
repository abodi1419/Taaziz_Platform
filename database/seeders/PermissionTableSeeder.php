<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //Users
            'User list',
            'User create',
            'User edit',
            'User delete',
            //Roles
            'Role list',
            'Role create',
            'Role edit',
            'Role delete',
            //Permissions
            'Permission list',
            'Permission create',
            'Permission edit',
            'Permission delete',
            //Articles
            'Article list',
            'Article create',
            'Article edit',
            'Article delete',
            //students
            'Student list',
            'Student create',
            'Student edit',
            'Student delete',
            //employers
            'Employer list',
            'Employer create',
            'Employer edit',
            'Employer delete',
            //jobs
            'Job create',
            'Job list',
            'Job edit',
            'Job delete',
            // job applications
            'Job_application create',
            'Job_application list',
            'Job_application edit',
            'Job_application delete',
            // profiles
            'Profile create',
            'Profile delete',
            'Profile edit',
            'Profile list',
            'Profile view',

        ];

        foreach ($data as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
