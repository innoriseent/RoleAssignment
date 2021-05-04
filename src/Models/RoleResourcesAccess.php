<?php

namespace Codeex\RoleAssignment\Models;

use App\Traits\ResourceMaker;
use Illuminate\Database\Eloquent\Model;

class RoleResourcesAccess extends Model
{
    use ResourceMaker;

    static public $resource_code = 'rra';

    protected $casts = ['rules' => 'object'];
    protected $fillable = [
        'role_code', 'resource_code', 'rules'
    ];
}
