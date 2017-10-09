<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
	$a = rand( 1, 100 );
	$b = rand( 1, 100 );
	$question = "".$a." + ".$b." = ?";
    $answer = ($a + $b);
    /*

	$wcB = $answer + 10;
	$wcC = $answer - 10;
	$wcD = $a - $b;
    */

    return [
        //
    'question'=>$question,//$faker->question,
    //'answer'=>$answer,
    /*
    'wrongchoiseB'=>$wcB,
    'wrongchoiseC'=>$wcC,
    'wrongchoiseD'=>$wcD,
    */
    ];
});
