<?php

use Illuminate\Database\Seeder;

class ItemsQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Item = App\Item::pluck('id');
   		  $last = count($Item) - 1;
        /*
        $arr = array();
        $numbers = count($Item);
        for ($i = 1;$i<=$numbers;$i++){
        	array_push($arr,$i);
        }
        array_rand($arr,$numbers);
        */
        for ($i = 1; $i <= count($Item); $i++) 
        {
          $item = App\Item::find($i);
       		$item->Question()->associate($i);
       		$item->save();

			/*
       		 for ($j = 0; $j < count($question); $j++){
       		 	$question[$j]->Activities()->attach(App\Activity::find($Activity[$i]));
       		 }
       		 */
        }
    }
}
