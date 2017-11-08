<?php

use Illuminate\Database\Seeder;

class TasksItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Task = App\Task::pluck('id');
   		$last = count($Task) - 1;

        for ($i = 0; $i < count($Task); $i++) {
            $item = App\Item::all()->random(10);

       		 for ($j = 0; $j < count($item); $j++){
       		 	$item[$j]->Tasks()->attach(App\Task::find($Task[$i]));
       		 }
        }
    }
}
