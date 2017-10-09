<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    //
    protected $fillable = [
    	//'type',
        'task_id',
        'mark',
        'open',
        'end',
    ];
    
    public function Task()
    {
        return $this->belongsTo('App\Task', 'task_id');//->withTimestamps()
    }
    
    public function Groups()
    {
        return $this->belongsToMany('App\Group')->withTimestamps();//->withTimestamps()
    }
}
