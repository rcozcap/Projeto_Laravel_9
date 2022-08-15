<?php

namespace App;

use Shanmuga\LaravelEntrust\Traits\LaravelEntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use LaravelEntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function eventsFK()
    {
        return $this->hasOne(Event::class,'id','user_id');
    }
   
    public function roleUserFK()
    {           //classe que deseja se conectar  tabela pivot id da tab piv segundo id da tab piv
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class, 'message_user', 'user_id', 'message_id');
    }

    public function userFolder(){
        //classe - nome da tab piv - primeiro o id da tabela em que está a função, nesse caso message - depois o id que representa a outra tab 
    return $this->belongsToMany(Folder::class, 'folders_user', 'user_id', 'folder_id');
    }

    public function isMaster()
    {
        return $this->ability('master', '');

    }public function isAdmin()
    {
        return $this->ability('admin', '');
    }
}