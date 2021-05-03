<?php

namespace Codeex\RoleAssignment\Http\Requests\Roles;

use App\Http\Requests\BaseRequestValidator;
use Codeex\RoleAssignment\Models\Role;
use Validator;

class RoleCreateRequest extends BaseRequestValidator
{
    public function validate(array $properties){
        $validator = Validator::make($properties, [
            'role_code' => 'required|string',
            'name' => 'required|string',
            'description' => 'string'
        ]);

        $exception = null;
        if($validator->fails()){
            $messages = $validator->errors();
            $exception = new \Exception(json_encode($messages));
        }else{
            $existingRole = Role::where('role_code', $properties['role_code'])->first();
            if($existingRole){
                $exception = new \Exception("Role with code {$existingRole->role_code} already exist");
            }
        }
        if($exception){
            throw $exception;
        }

        return $properties;
    }
}
