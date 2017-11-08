<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //factory(App\User::class, 50)->create()->each(function ($u) {
        //$u->posts()->save(factory(App\Post::class)->make());
   // });
            //factory(App\User::class, 50)->create();
        //DB::table('users')->delete();
            User::create([
                'name'     => 'Vincent',
                'email'    => 'vincent1591@hotmail.com',
                'password' => Hash::make('vincent'),
                'role_id'     => '1',
            ]);
            User::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'role_id'     => '1',
            ]);
            User::create([
                'name'     => 'a',
                'email'    => 'a@a.com',
                'password' => Hash::make('123456'),
                'role_id'     => '1',
            ]);
    }
}
