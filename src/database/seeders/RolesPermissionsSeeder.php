<?php

namespace Codeex\RoleAssignment\database\seeders;

use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Models\Role;
use Codeex\RoleAssignment\Models\RoleResourcesAccess;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleResourcesAccess::create([
            'role_code' => 'adm',
            'resource_code' => Resource::$resource_code,
            'rules' => json_encode([
                'c' => true,
                'r' => true,
                'u' => true,
                'd' => true
            ])
        ]);
        RoleResourcesAccess::create([
            'role_code' => 'user',
            'resource_code' => Resource::$resource_code,
            'rules' => json_encode([
                'c' => false,
                'r' => false,
                'u' => false,
                'd' => false
            ])
        ]);

    }
}
