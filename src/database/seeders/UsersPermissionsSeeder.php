<?php

namespace Codeex\RoleAssignment\database\seeders;

use App\Models\User;
use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Models\Role;
use Codeex\RoleAssignment\Models\RoleResourcesAccess;
use Codeex\RoleAssignment\Models\UserResourcesAccess;
use Illuminate\Database\Seeder;

class UsersPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
