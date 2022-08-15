<?php

namespace App\Models;

use Shanmuga\LaravelEntrust\Traits\LaravelEntrustUserTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'role_user', 'role_id', 'user_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id', 'permission_id');
    }
}