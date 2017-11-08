<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionLog extends Model
{
    //
        protected $fillable = [
    'user_id', 'assign_task_id','item_id','answer','correct'

    ];
    protected $hidden = [
    ];
    public function User()
    {
        return $this->belongsTo('App\User');//->withTimestamps()
    }
    public function AssignTask()
    {
        return $this->belongsTo('App\AssignTask');//->withTimestamps()
    }
    public function Item()
    {
        return $this->belongsTo('App\Item');//->withTimestamps()
    }
}
