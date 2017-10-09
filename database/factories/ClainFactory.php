<?php

use Faker\Generator as Faker;

$factory->define(App\Clain::class, function (Faker $faker) {
    return [
        //
        'name' => 'new clain',
    ];
});
