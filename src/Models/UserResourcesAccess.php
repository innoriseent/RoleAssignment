<?php

namespace Codeex\RoleAssignment\Models;

use App\Traits\ResourceMaker;
use Illuminate\Database\Eloquent\Model;

class UserResourcesAccess extends Model
{
    use ResourceMaker;

    static public $resource_code = 'ura';

    protected $casts = ['rules' => 'object'];
    protected $fillable = [
        'user_id', 'role_code', 'resource_code', 'rules'
    ];

}
