<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    protected $fillable = [
    'question', 'suspend'
    /*
    'answer',
    'wrongchoiseB',
    'wrongchoiseC',
    'wrongchoiseD',
	'writer',
	'source',
	'difficult'
    */
    ];
    protected $hidden = [
    /*
		"rate",
		"source",
		"writer",
		"opened",
		"created_at",
    */
    ];
    /*
    public function isOpen()
    {
        return $this->attributes['opened'];
    }
    */
    /*
    public function Activities()
    {
        return $this->belongsToMany('App\Activity');//->withTimestamps()
    }
    */
    public function Item()
    {
        return $this->belongsTo('App\Item');//->withTimestamps()
    }
    public function Answers()
    {
        return $this->hasMany('App\Answer');//->withTimestamps()
    }
}
