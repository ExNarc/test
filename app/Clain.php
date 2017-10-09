<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clain extends Model
{
    //
    protected $fillable = [
    	//'type',
    ];
    protected $hidden = [

    ];

    public function Tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();//->withTimestamps()
    }

}
