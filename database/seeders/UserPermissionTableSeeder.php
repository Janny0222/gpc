<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('id', 1)->first();

        $user->givePermissionTo('view-dashboard');

        $user->givePermissionTo('view-users');
        $user->givePermissionTo('create-users');
        $user->givePermissionTo('edit-users');
        $user->givePermissionTo('edit-users-permissions');
        $user->givePermissionTo('edit-users-password');
        $user->givePermissionTo('delete-users');
    }
}
