<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('respondent_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->foreign('respondent_id')->references('id')->on('respondent')->onDelete('cascade');;
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');;
            $table->integer('rating');
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
        Schema::dropIfExists('q_answer');
    }
}
