<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //

    protected $fillable = [
    	'answer','question_id', 'correct'
    ];

    protected $hidden = [
    ];

    public function Question()
    {
        return $this->belongsTo('App\Question')->withTimestamps();//->withTimestamps()
    }
}
