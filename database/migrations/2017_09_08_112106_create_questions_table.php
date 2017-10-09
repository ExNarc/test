<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->String('question');
            //$table->String('answer')->nullable();
            /*
            $table->String('type')->default("MC");
            $table->String('answer');
            $table->String('wrongchoiseB')->nullable();
            $table->String('wrongchoiseC')->nullable();
            $table->String('wrongchoiseD')->nullable();
            $table->String('writer')->nullable();
            $table->String('source')->nullable();
            $table->integer('difficult')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('timelimit')->nullable();
            */
            $table->boolean('suspend')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
