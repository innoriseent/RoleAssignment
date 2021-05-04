<?php

namespace Codeex\RoleAssignment\database\seeders;

use Codeex\RoleAssignment\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_code' => 'adm',
            'name' => 'Administrator',
            'description' => 'Administrations role'
        ]);

        Role::create([
            'role_code' => 'user',
            'name' => 'User',
            'description' => 'Simple user role'
        ]);
    }
}
