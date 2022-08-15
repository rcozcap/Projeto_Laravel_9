<?php

namespace App\Models;

use Shanmuga\LaravelEntrust\Traits\LaravelEntrustPermissionTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model

{
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role','permission_id', 'role_id');
    }
}