<?php

namespace Codeex\RoleAssignment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestValidator;
use Codeex\RoleAssignment\Http\Requests\Roles\RoleCreateRequest;
use Codeex\RoleAssignment\Http\Requests\Roles\RoleRequest;
use Codeex\RoleAssignment\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request){
        return response()->json(Role::all());
    }

    public function get(Request $request){
        $data = RequestValidator::validate($request->all(), RoleRequest::class);
        $role = Role::where('role_code', $data['role_code'])->first();
        return response()->json($role);
    }

    public function create(Request $request){
        $data = RequestValidator::validate($request->all(), RoleCreateRequest::class);
        $role = Role::create($data);
        return response()->json($role);
    }
}
