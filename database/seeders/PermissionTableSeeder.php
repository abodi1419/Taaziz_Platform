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

        ];

        foreach ($data as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
