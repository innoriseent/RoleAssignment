<?php


namespace Codeex\RoleAssignment\Services;


use Codeex\RoleAssignment\Models\Msp;
use Laravel\Lumen\Http\Request;

class RaService
{

    public function initial(Request $request){
        $foundSubDomain = explode('.', $request->server->get('SERVER_NAME'));
        $mspSubdomain = (!empty($foundSubDomain) && !empty($foundSubDomain[0])) ? $foundSubDomain[0] : null;
        if(!$mspSubdomain){
            throw new \Exception("Not founded domain or msp");
        }
        return Msp::where('domain', $mspSubdomain)->first();
    }
}
