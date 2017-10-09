<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //
    protected $fillable = [
    	'name', 'desc', 'level_id', 'item_id', 
    ];
    protected $hidden = [

    ];

    public function Item()
    {
        return $this->belongsTo('App\Item');//->withTimestamps()
    }
    public function Level()
    {
        return $this->belongsTo('App\Level');//->withTimestamps()
    }

}
