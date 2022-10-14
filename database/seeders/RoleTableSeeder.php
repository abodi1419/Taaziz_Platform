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

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo("Article create");
        $role->givePermissionTo("Article list");
        $role->givePermissionTo("Article edit");
        $role->givePermissionTo("Article delete");

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo("Article create");
        $role->givePermissionTo("Article list");
        $role->givePermissionTo("Article edit");
        $role->givePermissionTo("Article delete");

//        $role->givePermissionTo("Student create");
//        $role->givePermissionTo("Student list");
//        $role->givePermissionTo("Student edit");
//        $role->givePermissionTo("Student delete");

        $role->givePermissionTo("Job list");
    }
}
