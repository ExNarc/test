<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    public function Rules()
    {
        return $this->hasMany('App\Rule');//->withTimestamps()
    }
}
