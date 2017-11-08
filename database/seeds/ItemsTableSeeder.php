<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Item::class, 40)->create();
        /*
        factory(App\Item::class, 10)->create()->each(function ($u) {
        	$q = App\Question::find($u->id);
            $u->Question->attach($q);//-withTimestamps()
        });
        */

    }
}
