<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClainTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create('clain_task', function (Blueprint $table) {
            //$table->increments('id');
            //$table->integer('clain_id')->unsigned()->index();
            //$table->foreign('clain_id')->references('id')->on('clains')->onDelete('cascade');
            //$table->integer('task_id')->unsigned()->index();
            //$table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            //$table->timestamps();
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clain_task');
    }
}
