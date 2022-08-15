<?php

namespace App\Http\Controllers\Form;

use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Repository\PermissionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    //redirects

    public function listUser(UserRepository $model)
    {
        $users = $model->all();

        return view('admin/list_users', ['users' => $users]);
    }

    public function createUser()
    {
        return view('admin/cad_new_user');

    }

    public function editUser(UserRepository $model, $id)
    {
            //$logUser = Auth::user()->isMaster();
            //$logUser2 = Auth::user()->isAdmin();

            if ($users= $model->find($id)) {

            //if ($logUser) {

                return view('admin/form_editUser', [
                    'user' => $users,
                ]);
            //} elseif ($logUser2 && auth()->user()->id == $id) {

                //return view('admin/form_editUser', [
                   // 'user' => $users,
                //]);
            } else {
                return redirect()->back()->withInput()->withErrors(['Você não tem permissão para editar esse usuário']);
            }
    }
    //redirects
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request, PermissionRepository $model)
    {
        $permissions = $model->all();

        $request->except(['_token']);

        $role = new Role();
        $role->name = $request->role_name;
        $role->display_name = $request->role_display;
        $role->description = $request->role_description;

        if ($role->save()) {
        
        $insertedId = $role->id;

        $id = $request->perm;

        foreach($id as $id){    
            DB::table('permission_role')->insert([
                'permission_id' => $id,
                'role_id' => $insertedId,
            ]);
        }
    }
        return view('admin/permissions/permissions', compact('permissions'));
    }

    public function updateRole(Request $request, PermissionRepository $model, $id)
    {
        $permissions = $model->all();

        $request->except(['_token']);

        $role = Role::find($id);
        $role->name = $request->role_name;
        $role->display_name = $request->role_display;
        $role->description = $request->role_description;

        if ($role->save()) {

        $id_perm = $request->perm;

        foreach($id as $id){    
            DB::table('permission_role')->update([
                'permission_id' => $id_perm,
                'role_id' => $id,
            ]);
        }
    }
        return view('admin/permissions/permissions', compact('permissions'));
    }

    public function updateRolesUser(Request $request, UserRepository $model, RoleRepository $model2, PermissionRepository $model3, $id)
    {
        $request->except(['_token']);

        $roles = $model2->all();
        $permissions = $model3->all();

        $users = $model->find($id);

        $id_perm = $request->perm;

        DB::table('role_user')->where('user_id', $id)->delete();

        foreach($id_perm as $id_perm){    
            DB::table('role_user')->insert([
                'user_id' => $id,
                'role_id' => $id_perm,
            ]);
        }
        return view('admin/permissions/permissions', ['users' => $users, 'roles' => $roles, 'permissions' => $permissions])->with('success','Perfis do usuário alterados com sucesso!');;
    }

    public function updatePermissionForRole(Request $request, RoleRepository $model, PermissionRepository $model2, UserRepository $model3, $id)
    {
        $request->except(['_token']);

        $permissions = $model2->all();
        $users = $model3->all();

        $roles = $model->find($id);

        $id_perm = $request->perm;

        DB::table('permission_role')->where('role_id', $id)->delete();

        foreach($id_perm as $id_perm){    
            DB::table('permission_role')->insert([
                'role_id' => $id,
                'permission_id' => $id_perm,
            ]);
        }
        return view('admin/permissions/permissions', ['users' => $users, 'roles' => $roles, 'permissions' => $permissions])->with('success','Perfis do usuário alterados com sucesso!');;
    }

    public function createPerm(Request $request, RoleRepository $model)
    {
        $roles = $model->all();

        $request->except(['_token']);

        $permission = new Permission();
        $permission->name = $request->perm_name;
        $permission->display_name = $request->perm_display;
        $permission->description = $request->perm_description;
        $permission = $request->perm;
        
        if ($permission->save()) {
        
            $insertedId = $permission->id;
    
            $id = $request->role;
    
            foreach($id as $id){    
                DB::table('permission_role')->insert([
                    'permission_id' => $id,
                    'role_id' => $insertedId,
                ]);
            }
        }
            return view('admin/permissions/permissions', compact('roles'));
        }

    /*public function atribPerm(Request $request, RoleRepository $model,  PermissionRepository $model2)
    {
        $roles = $model->all();
        $permissions = $model2->all();
        $id = $request->perm;
        $role = $request->role;

        $request->except(['_token']);

            foreach($id as $id){    
            DB::table('permission_role')->insert([
                'permission_id' => $id,
                'role_id' => $role,
            ]);
        }
    
        return view('admin/teste', compact('roles', 'permissions'));
    }
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserStoreRequest $request, UserRepository $model)
    {
        $model->store($request);

        return redirect()->route('admin.listUser')->with('success','Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function listPerm(UserRepository $model, RoleRepository $model2, PermissionRepository $model3)
    {
        $users = $model->all();
        $roles = $model2->all();
        $permissions = $model3->all();

        return view('admin/permissions/permissions', compact('users', 'roles', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function formRole(PermissionRepository $model, RoleRepository $model2)
    {
        $permissions = $model->all();
        $roles = $model2->all();

        return view('admin/permissions/form_new_role', compact('permissions', 'roles'));
    }

    public function formPerm(PermissionRepository $model, RoleRepository $model2)
    {
        $permissions = $model->all();
        $roles = $model2->all();

        return view('admin/permissions/form_new_permission', compact('permissions', 'roles'));
    }

    public function formEditRoleUser(PermissionRepository $model2, RoleRepository $model, UserRepository $model3, $id)
    {
            //$logUser = Auth::user()->isMaster();

            $roles= $model->all();
            $permissions = $model2->all();
            $user= $model3->find($id);

            //if ($logUser) {

                return view('admin/permissions/form_edit_role_permission', ['roles' => $roles, 'permissions' => $permissions, 'user' => $user]);
            /*} else {
                return redirect()->back()->withInput()->withErrors(['Você não tem permissão para editar perfis e permissões de usuários']);
            }*/
    }

    public function formEditPermForRole(PermissionRepository $model2, RoleRepository $model, $id)
    {
            //$logUser = Auth::user()->isMaster();

            $roles= $model->find($id);
            $permissions = $model2->all();

            //if ($logUser) {

                return view('admin/permissions/form_edit_permission_role', ['roles' => $roles, 'permissions' => $permissions]);
            /*} else {
                return redirect()->back()->withInput()->withErrors(['Você não tem permissão para editar perfis e permissões de usuários']);
            }*/
    }

    public function listRoles(RoleRepository $model)
    {
        $roles = $model->all();

        return view('admin/permissions/listRoles', ['roles' => $roles]);
    }

    public function listRolesPerm(PermissionRepository $model)
    {
        $permissions = $model->all();

        return view('admin/permissions/listRolesPerm', ['permissions' => $permissions]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, UserRepository $model, $id)
    {
        $model->update($request, $id);

        return redirect()->route('admin.listUser')->with('success','Os dados do usuário foram editados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyUser(UserRepository $model, $id)
    {
        if (auth()->check() === true) {

            $logUser = Auth::user()->isMaster();
            $logUser2 = Auth::user()->isAdmin();

            $user= $model->find($id);

            if ($logUser) {

                $user->delete();
                return redirect()->route('admin.listUser')->with('success','Usuário deletado com sucesso!');
            } elseif ($logUser2 && auth()->user()->id == $id) {

                $user->delete();
                return redirect()->route('admin.listUser')->with('success','Usuário deletado com sucesso!');
            } else {
                return redirect()->back()->withInput()->withErrors(['Você não tem permissão para excluir esse usuário']);
            }
        } else {
            return redirect()->route('admin.login')->withInput()->withErrors(['Você não tem permissão para acessar a área de administrador']);
        }
    }
}