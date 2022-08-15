<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//user area
Route::resource('usuarios', 'App\Http\Controllers\Form\\UserController', ['names' => 'user', 'parameters' => ['usuarios' => 'user']]);

Route::get('inicio', 'App\Http\Controllers\Index\\IndexController@redirect_main')->name('index.main');
Route::get('Inicio/epis', 'App\Http\Controllers\Index\\IndexController@redirect_epis')->name('index.epis');

//Delete User
Route::get('admin/delete/{user}', 'Form\\UserController@destroyUser')->name('admin.destroyUser');

//login
Route::get('/admin', 'App\Http\Controllers\Admin\\AuthController@mainPanel')->name('admin');
Route::get('/admin/login', 'App\Http\Controllers\Admin\\AuthController@loginPanel')->name('admin.login');
Route::post('/admin/login/do', 'App\Http\Controllers\Admin\\AuthController@login')->name('admin.login.do');
Route::get('/admin/logout', 'App\Http\Controllers\Admin\\AuthController@logout')->name('admin.logout');
//login

////redirect
Route::get('admin/listar/Usuarios', 'App\Http\Controllers\Form\\UserController@listUser')->name('admin.listUser');
Route::get('admin/criar/NovoUsuario', 'App\Http\Controllers\Form\\UserController@createUser')->name('admin.newUser');
Route::get('admin/editar/Usuario/{id}', 'App\Http\Controllers\Form\\UserController@editUser')->name('admin.editUser');

// perm and roles forms
Route::get('admin/listar/permissoes', 'App\Http\Controllers\Form\\UserController@listPerm')->name('admin.listPerm');
Route::get('admin/form/novoPerfil', 'App\Http\Controllers\Form\\UserController@formRole')->name('admin.newRole');
Route::get('admin/form/novaPermissao', 'App\Http\Controllers\Form\\UserController@formPerm')->name('admin.newPerm');
Route::get('admin/form/editar/PerfisPorUsuario/{id}', 'App\Http\Controllers\Form\\UserController@formEditRoleUser')->name('admin.editRoleUser');
Route::get('admin/form/editar/PermissoesporPerfis/{id}', 'App\Http\Controllers\Form\\UserController@formEditPermForRole')->name('admin.editPermForRole');
Route::put('admin/editar/Perfil/{id}', 'App\Http\Controllers\Form\\UserController@updateRole')->name('admin.updateRole');
Route::put('admin/editar/PerfildoUsuario/{id}', 'App\Http\Controllers\Form\\UserController@updateRolesUser')->name('admin.updateRoleUser');
Route::put('admin/editar/PermissaoPorPerfil/{id}', 'App\Http\Controllers\Form\\UserController@updatePermissionForRole')->name('admin.updatePermissionForRole');

//list (perm and roles redirect)
Route::get('admin/listar/PerfilePermissoes', 'App\Http\Controllers\Form\\UserController@listRolesPerm')->name('admin.listRolesPerm');
Route::get('admin/listar/Perfil', 'App\Http\Controllers\Form\\UserController@listRoles')->name('admin.listRoles');

//create permissions and roles code
Route::post('admin/criarPerfil', 'App\Http\Controllers\Form\\UserController@createRole')->name('admin.createRole');
Route::post('admin/criarPermissao', 'App\Http\Controllers\Form\\UserController@createPerm')->name('admin.createPerm');
Route::post('admin/atribuirPermissao', 'App\Http\Controllers\Form\\UserController@atribPerm')->name('admin.atribPerm');

