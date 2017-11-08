<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
    	'groupname',
    ];
    public function Users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();//->withTimestamps()
    }
    public function AssignTasks()
    {
        return $this->belongsToMany('App\AssignTask')->withTimestamps();//->withTimestamps()
    }

}
