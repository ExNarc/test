<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
	$q = App\Question::all()->random();
	$qid = $q->id;
	$tf = rand(0,1);
	$answer = rand(300,500);
	if ($tf>0)
		$answer = $q->answer;	
    return [
        //
    	'question_id'=>$qid,
    	'answer'=>$answer,
    	'correct'=>$tf,
    ];
});
