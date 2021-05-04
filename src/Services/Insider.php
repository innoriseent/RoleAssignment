<?php


namespace Codeex\RoleAssignment\Services;


use App\Lib\CodeexInsider;
use App\Models\User;
use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Models\Role;
use Codeex\RoleAssignment\Models\RoleResourcesAccess;
use Codeex\RoleAssignment\Models\UserResourcesAccess;

class Insider extends CodeexInsider
{

    public function runSeeds()
    {
        $this->rolesSeeder();
        $this->resourcesSeeder();
        $this->rolesPermissionsSeeder();
        $this->userPermissionsSeeder();
    }

    protected function rolesSeeder(){
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

    protected function resourcesSeeder(){
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

    protected function rolesPermissionsSeeder(){
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

    protected function userPermissionsSeeder(){
        $existingUsers = User::all();
        $existingResources = Resource::all();
        foreach ($existingUsers as $existingUser) {
            if($existingUser->role_code === 'adm'){
                foreach ($existingResources as $existingResource) {
                    UserResourcesAccess::create([
                        'user_id' => $existingUser->id,
                        'role_code' => $existingUser->role_code,
                        'resource_code' => $existingResource->role_code,
                        'rules' => json_encode([
                            'c' => true,
                            'r' => true,
                            'u' => true,
                            'd' => true
                        ])
                    ]);
                }
            }else{
                foreach ($existingResources as $existingResource) {
                    UserResourcesAccess::create([
                        'user_id' => $existingUser->id,
                        'role_code' => $existingUser->role_code,
                        'resource_code' => $existingResource->role_code,
                        'rules' => json_encode([
                            'c' => false,
                            'r' => false,
                            'u' => false,
                            'd' => false
                        ])
                    ]);
                }
            }
        }
    }
}
