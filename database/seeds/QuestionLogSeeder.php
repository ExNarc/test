<?php

use Illuminate\Database\Seeder;

class QuestionLogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $num = 40;
        //factory(App\QuestionLog::class, $num)->create();
        for ($i=0; $i <$num ; $i++) { 
            $asT = App\AssignTask::all()->random();
            $tsk = $asT->Task;
            for ($item=0; $item < 10; $item++) { 
                $itm = $tsk->Items[$item];
                $ans = $itm->Question->Answers->where('correct','=','1')->first()->answer;
                $correct = rand(1,10)>2;
                if ($correct){
                    $correct = 1;
                }
                else {
                    $correct = 0;
                    $ans +=11;
                }
                DB::table('question_logs')->insert(array(
                    'assign_task_id' => $asT->id,
                    'task_id' => $tsk->id,
                    'item_id' => $itm->id,
                    'user_id' => 3,
                    'answer' => $ans,
                    'correct' => $correct
                ));
            }
        }
        /**/
    }
}
