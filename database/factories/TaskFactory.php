<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
	$number = rand( 1000, 10000 );
    return [
        //
        'name' => "task".$number,
        'category' => "Math",
        'target' => "addition exc.",
    ];
});
