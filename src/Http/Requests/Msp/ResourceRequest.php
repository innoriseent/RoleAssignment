<?php

namespace Codeex\RoleAssignment\Http\Requests\Resources;

use App\Http\Requests\BaseRequestValidator;
use Codeex\RoleAssignment\Models\Resource;
use Validator;

class ResourceRequest extends BaseRequestValidator
{
    public function validate(array $properties){
        $validator = Validator::make($properties, [
            'resource_code' => 'required|string'
        ]);

        if($validator->fails()){
            $messages = $validator->errors();
            $this->exception = new \Exception(json_encode($messages));
        }else{
            $resource = Resource::where('resource_code', $properties['resource_code'])->first();
            if(!$resource){
                $this->exception = new \Exception("The resource with code {$properties['resource_code']} does not exist");
            }
        }

        if($this->exception){
            throw $this->exception;
        }

        return $properties;
    }
}
