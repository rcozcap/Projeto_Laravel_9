<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository
{
    protected $model = User::class;

    public function store($request)
    {
        $request->except(['_token']);

        $user = new User();
        $user->level = $request->create_level;
        $user->name = $request->create_name;
        $user->last_name = $request->create_last_name;
        $user->photo = $request->file('create_photo')->store('userPhoto');
        $user->password = Hash::make($request->create_pass);
        $user->email = $request->create_email;
        $user->pass_rem = $request->create_pass_rem;
        $user->birth = $request->create_age;
        $user->job = $request->create_job;
        $user->spec = $request->create_specialization;
        $user->educ_lvl = $request->create_educ_lvl;
        $user->phone = $request->create_phone;
        $user->lang_1 = $request->create_lang_1;
        $user->lang_2 = $request->create_lang_2;
        $user->lang_3 = $request->create_lang_3;
        $user->occup_time = $request->create_occup_time;
        $user->overview = $request->create_overview;
        $user->save();
    }
    
    public function update($request, $id)
    {
        $model = User::find($id);
        $model->level = $request->edit_level;
        $model->name = $request->edit_name;
        $model->last_name = $request->edit_last_name;
        if ($request->edit_photo) {
            $model->photo = $request->file('edit_photo')->store('userPhoto');
        } else {
            null;
        }
        $model->password = Hash::make($request->edit_pass);
        $model->pass_rem = $request->edit_pass_rem;
        $model->birth = $request->edit_age;
        $model->job = $request->edit_job;
        $model->spec = $request->edit_specialization;
        $model->educ_lvl = $request->edit_educ_lvl;
        $model->phone = $request->edit_phone;
        $model->lang_1 = $request->edit_lang_1;
        $model->lang_2 = $request->edit_lang_2;
        $model->lang_3 = $request->edit_lang_3;
        $model->occup_time = $request->edit_occup_time;
        $model->overview = $request->edit_overview;
        $model->remember_token = $request->_token;
        $model->save();
    }
}