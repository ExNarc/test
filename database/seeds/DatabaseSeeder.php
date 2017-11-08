<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(ActivitiesTableSeeder::class);
        
        $this->call(QuestionsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        //$this->call(ClainsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);



        //$this->call(ClainsTasksTableSeeder::class);
        $this->call(TasksItemsTableSeeder::class);
        $this->call(ItemsQuestionsTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(UsersGroupsTableSeeder::class);
        $this->call(AssignTaskTableSeeder::class);
        $this->call(QuestionLogTableSeeder::class);

    }
}
