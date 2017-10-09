<?php

use Faker\Generator as Faker;

$factory->define(App\AssignTask::class, function (Faker $faker) {
    return [
        //
        'task_id' => rand( 1, 10 ),
        //'open' => rand( 1, 10 ),
    ];
});
