<?php

namespace Codeex\RoleAssignment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestValidator;
use Codeex\RoleAssignment\Http\Requests\Resources\ResourceCreateRequest;
use Codeex\RoleAssignment\Http\Requests\Resources\ResourceRequest;
use Codeex\RoleAssignment\Http\Requests\Roles\RoleCreateRequest;
use Codeex\RoleAssignment\Http\Requests\Roles\RoleRequest;
use Codeex\RoleAssignment\Models\Resource;
use Codeex\RoleAssignment\Models\Role;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request){
        return response()->json(Resource::all());
    }

    public function get(Request $request){
        $data = RequestValidator::validate($request->all(), ResourceRequest::class);
        $resource = Resource::where('resource_code', $data['resource_code'])->first();
        return response()->json($resource);
    }

    public function create(Request $request){
        $data = RequestValidator::validate($request->all(), ResourceCreateRequest::class);
        $resource = Resource::create($data);
        return response()->json($resource);
    }
}
