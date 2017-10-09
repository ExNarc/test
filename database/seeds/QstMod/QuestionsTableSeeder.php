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
        factory(App\Question::class, 40)->create();
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
