<?php

namespace Codeex\RoleAssignment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestValidator;
use Codeex\RoleAssignment\Http\Requests\Roles\RoleCreateRequest;
use Codeex\RoleAssignment\Http\Requests\Roles\RoleRequest;
use Codeex\RoleAssignment\Models\Role;
use Codeex\RoleAssignment\Services\RaService;
use Illuminate\Http\Request;

class InitialController extends Controller
{

    public function initial(Request $request, RaService $raService){
        return $raService->initial($request);
    }
}
