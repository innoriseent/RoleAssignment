<?php

namespace Codeex\RoleAssignment\Models;

use App\Traits\ResourceMaker;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use ResourceMaker;

    static public $resource_code = 'role';

    protected $fillable = [
        'role_code', 'name', 'description'
    ];

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

}
