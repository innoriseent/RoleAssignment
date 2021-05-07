<?php

namespace Codeex\RoleAssignment\Http\Requests\Msp;

use App\Http\Requests\BaseRequestValidator;
use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Models\Role;
use Validator;

class MspCreateRequest extends BaseRequestValidator
{
    public function validate(array $properties){
        $validator = Validator::make($properties, [
            'resource_code' => 'required|string',
            'name' => 'required|string',
            'description' => 'string'
        ]);

        if($validator->fails()){
            $messages = $validator->errors();
            $this->exception = new \Exception(json_encode($messages));
        }else{
            $existingResource = Resource::where('resource_code', $properties['resource_code'])->first();
            if($existingResource){
                $this->exception = new \Exception("The resource with code {$existingResource->resource_code} already exist");
            }
        }
        if($this->exception){
            throw $this->exception;
        }

        return $properties;
    }
}
