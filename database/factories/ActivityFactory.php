<?php

use Faker\Generator as Faker;


$factory->define(App\Activity::class, function (Faker $faker) {
	$name ="Ex".rand(1000,2000);
    return [
        //
    	'activityname'=>$name

    ];
});
