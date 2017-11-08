<?php

use Faker\Generator as Faker;
// bad !!!!! not use now
$factory->define(Model::class, function (Faker $faker) {
	$asT = App\AssignTask::all()->random();
	$tsk = $asT->Task->id;
	$itm = App\Item::all()->random();
    return [
    	'assign_task_id' => $asT->id,
    	'task_id' => $tsk->id,
    	'item_id' => $itm->id,
    	'user_id' => 3,
        //
    ];
});
