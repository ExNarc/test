<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role()
    {
        return $this->belongsTo('App\Role');//->withTimestamps()
    }

    public function Groups()
    {
        return $this->belongsToMany('App\Group')->withTimestamps();//->withTimestamps()
    }
    public function QuestionLog()
    {
        return $this->hasMany('App\QuestionLog');//->withTimestamps()
    }
}
