<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
	$number = rand( 1000, 10000 );
	//$question =App\Question::pluck('id')->random(1)->all()[0];

    return [
        //
        'name' => "item".$number,
        'type' => "MC",
        'target' => "addition exc.",
        //'question_id' => $question,
    ];
});
