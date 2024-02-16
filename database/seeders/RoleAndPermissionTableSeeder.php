<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'guard'
        ]);

        Permission::truncate();

        Permission::create([
            'name' => 'view-dashboard'
        ]);
        Permission::create([
            'name' => 'view-users'
        ]);
        Permission::create([
            'name' => 'create-users'
        ]);
        Permission::create([
            'name' => 'edit-users'
        ]);
        Permission::create([
            'name' => 'edit-users-permissions'
        ]);
        Permission::create([
            'name' => 'edit-users-password'
        ]);
        Permission::create([
            'name' => 'delete-users'
        ]);


        Schema::enableForeignKeyConstraints();
    }
}
