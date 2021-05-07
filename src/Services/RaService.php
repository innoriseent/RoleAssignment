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
        $msp = Msp::where('domain', $mspSubdomain)->first();
        if(!$msp){
            $msp = Msp::where('domain', env('DEFAULT_DOMAIN'))->first();
        }
        return $msp;
    }
}
