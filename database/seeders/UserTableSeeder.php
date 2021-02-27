<?php

namespace Database\Seeders;

use App\User;
use App\Role;

use Illuminate\Database\Seeder;

class UserTableSeeder  extends Seeder
{
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_mod = Role::where('name', 'mod')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'mod';
        $user->email = 'mod@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_mod);
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
