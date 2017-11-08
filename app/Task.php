<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $fillable = [
    	//'type',
        'name',
        'category',
    ];
    protected $hidden = [

    ];

    public function Clains()
    {
        return $this->belongsToMany('App\Clain')->withTimestamps();//->withTimestamps()
    }
    public function Items()
    {
        return $this->belongsToMany('App\Item')->withTimestamps();//->withTimestamps()
    }
    
    public function AssignTasks()
    {
        return $this->hasMany('App\AssignTask');//->withTimestamps()
    }
}
