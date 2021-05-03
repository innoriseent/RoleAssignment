<?php

namespace Codeex\RoleAssignment\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_code', 'name', 'description'
    ];
}
