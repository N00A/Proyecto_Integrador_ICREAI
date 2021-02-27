<?php

namespace Database\Seeders;

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'mod';
        $role->description = 'moderador';
        $role->save();
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'administrador';
        $role->save();
    }
}
