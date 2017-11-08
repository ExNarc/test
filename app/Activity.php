<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['activityname','topic'];
    
    public function Questions()
    {
        return $this->belongsToMany('App\Question');//->withTimestamps()
    }
}
