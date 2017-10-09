<?php

use Illuminate\Database\Seeder;
use App\Level;
class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		Level::create([
			'desc' => 'unknown the knowledge'
		]);
		Level::create([
			'desc' => 'know the knowledge'
		]);
		Level::create([
			'desc' => 'enable to use the knowledge'
		]);

		    // level 0 unknown the knowledge
            // level 1 know the knowledge
            // level 2 enable to use the knowledge
    }
}
