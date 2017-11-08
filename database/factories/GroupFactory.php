<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        //
        "groupname"=>"group".rand(1,100),
    ];
});
