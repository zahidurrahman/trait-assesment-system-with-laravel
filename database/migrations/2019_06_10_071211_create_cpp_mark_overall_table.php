<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCppMarkOverallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpp_mark_overall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('respondent_id')->unsigned();
            $table->integer('assesment_id')->unsigned();
            $table->foreign('respondent_id')->references('id')->on('respondent')->onDelete('cascade');;
            $table->foreign('assesment_id')->references('id')->on('assesment')->onDelete('cascade');;
            $table->integer('score_cluster1');
            $table->integer('score_cluster2');
            $table->integer('score_cluster3');
            $table->integer('score_cluster4');
            $table->integer('score_cluster5');
            $table->integer('score_cluster6');
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
        Schema::dropIfExists('cpp_mark_overall');
    }
}
