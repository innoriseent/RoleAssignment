<?php

namespace Codeex\RoleAssignment\database\seeders;

use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Models\Role;
use Codeex\RoleAssignment\Models\RoleResourcesAccess;
use Codeex\RoleAssignment\Models\UserResourcesAccess;
use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resource::create([
            'resource_code' => Resource::$resource_code,
            'name' => 'Resources',
            'description' => 'Permissions to work with resources'
        ]);
        Resource::create([
            'resource_code' => Role::$resource_code,
            'name' => 'Roles',
            'description' => 'Permissions to work with roles'
        ]);
        Resource::create([
            'resource_code' => RoleResourcesAccess::$resource_code,
            'name' => 'Role Permissions',
            'description' => 'Access to assign resources to roles'
        ]);
        Resource::create([
            'resource_code' => UserResourcesAccess::$resource_code,
            'name' => 'User Permissions',
            'description' => 'Access to assign resources to users'
        ]);

    }
}
