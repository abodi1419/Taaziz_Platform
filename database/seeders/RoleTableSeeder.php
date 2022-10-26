<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo("Article create");
        $role->givePermissionTo("Article list");
        $role->givePermissionTo("Job list");
        $role->givePermissionTo("Job_application create");


        $role = Role::create(['name' => 'employer']);
        $role->givePermissionTo("Job create");
        $role->givePermissionTo("Job_application list");
        $role->givePermissionTo("Profile view");



//        $role->givePermissionTo("Student create");
//        $role->givePermissionTo("Student list");
//        $role->givePermissionTo("Student edit");
//        $role->givePermissionTo("Student delete");

    }
}
