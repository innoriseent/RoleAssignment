<?php

namespace Codeex\RoleAssignment\Http\Requests\Roles;

use App\Http\Requests\BaseRequestValidator;
use Codeex\RoleAssignment\Models\Role;
use Validator;

class RoleRequest extends BaseRequestValidator
{
    public function validate(array $properties){
        $validator = Validator::make($properties, [
            'role_code' => 'required|string'
        ]);

        if($validator->fails()){
            $messages = $validator->errors();
            $this->exception = new \Exception(json_encode($messages));
        }else{
            $role = Role::where('role_code', $properties['role_code'])->first();
            if(!$role){
                $this->exception = new \Exception("Role with code {$properties['role_code']} does not exist");
            }
        }
        if($this->exception){
            throw $this->exception;
        }
        return $properties;
    }
}
