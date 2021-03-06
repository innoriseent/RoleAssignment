<?php

namespace Codeex\RoleAssignment\Models;

use App\Traits\ResourceMaker;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use ResourceMaker;

    static public $resource_code = 'account';
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

    public function msp(){
        return $this->belongsTo(Msp::class, 'msp_id', 'id');
    }
}
