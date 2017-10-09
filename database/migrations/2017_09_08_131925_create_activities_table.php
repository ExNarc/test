<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create('activities', function (Blueprint $table) {
            //$table->increments('id');
            //$table->String('activityname');
            //$table->String('topic')->nullable();
            //$table->integer('rate')->nullable();
            //$table->String('source')->nullable();
            //$table->String('writer')->nullable();
            //$table->boolean('opened')->default(true);
            //$table->timestamps();
        //});
        //Schema::create('activity_question', function (Blueprint $table) {
            //$table->integer('activity_id')->unsigned()->index();
            //$table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            //$table->integer('question_id')->unsigned()->index();
            //$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::dropIfExists('activities');
    }
}
