<?php

use Illuminate\Database\Seeder;

class ClainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Clain::class, 3)->create();
    }
}
