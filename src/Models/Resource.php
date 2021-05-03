<?php

namespace Codeex\RoleAssignment\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'resource_code', 'name', 'description'
    ];
}
