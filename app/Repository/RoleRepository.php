<?php

namespace App\Repository;

use App\Models\Role;

class RoleRepository extends AbstractRepository
{
    protected $model = Role::class;

    public function update($request, $id)
    {
        $model = Role::find($id);
        $model->name = $request->role_name;
        $model->display_name = $request->role_display;
        $model->remember_token = $role_description;
        $model->save();
    }
}