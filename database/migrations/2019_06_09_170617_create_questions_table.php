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
            $table->integer('assesment_id')->unsigned();
            $table->foreign('assesment_id')->references('id')->on('assesment')->onDelete('cascade');;
            $table->mediumText('question_name');
            $table->string('cluster');
            $table->string('adt');
            //$table->string('sub_cluster');
            $table->string('trait_type');
            $table->tinyInteger('reverse')->default('0');
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
