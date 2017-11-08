<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       // factory(App\Question::class, 40)->create();
        for ($i=0; $i <40 ; $i++) { 
            $a = rand( 1, 100 );
            $b = rand( 1, 100 );
            $question = "".$a." + ".$b." = ?";
            $answer = ($a + $b);

            $question_id = DB::table('questions')->insertGetId(array('question' => $question));
            DB::table('answers')->insert(array('question_id' => $question_id, 'answer' => $answer,'correct'=>true));
            DB::table('answers')->insert(array('question_id' => $question_id, 'answer' => $answer+11));
            DB::table('answers')->insert(array('question_id' => $question_id, 'answer' => $answer-11));
        }
        /*
        factory(App\Activity::class, 10)->create();
        
        $Activity = App\Activity::pluck('id');
    $last = count($Activity) - 1;

        for ($i = 0; $i < count($Activity); $i++) {
            $question = App\Question::all()->random(10);

             for ($j = 0; $j < count($question); $j++){
                $question[$j]->Activities()->attach(App\Activity::find($Activity[$i]));
             }
        }
        */
    }
}
