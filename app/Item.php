<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    protected $fillable = [
    	'type', 'name', 'target', 'question_id', 
    ];
    protected $hidden = [

    ];

    public function Question()
    {
        return $this->belongsTo('App\Question');//->withTimestamps()
    }
    public function Tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();//->withTimestamps()
    }
    public function QuestionLog()
    {
        return $this->hasMany('App\QuestionLog');//->withTimestamps()
    }
}
