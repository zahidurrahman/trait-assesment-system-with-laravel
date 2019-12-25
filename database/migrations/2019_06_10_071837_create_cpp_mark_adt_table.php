<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCppMarkAdtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpp_mark_adt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('respondent_id')->unsigned();
            $table->integer('assesment_id')->unsigned();
            $table->foreign('respondent_id')->references('id')->on('respondent')->onDelete('cascade');;
            $table->foreign('assesment_id')->references('id')->on('assesment')->onDelete('cascade');;

            $table->integer('cluster1_a');
            $table->integer('cluster1_d');
            $table->integer('cluster1_t');

            $table->integer('cluster2_a');
            $table->integer('cluster2_d');
            $table->integer('cluster2_t');

            $table->integer('cluster3_a');
            $table->integer('cluster3_d');
            $table->integer('cluster3_t');

            $table->integer('cluster4_a');
            $table->integer('cluster4_d');
            $table->integer('cluster4_t');

            $table->integer('cluster5_a');
            $table->integer('cluster5_d');
            $table->integer('cluster5_t');

            $table->integer('cluster6_a');
            $table->integer('cluster6_d');
            $table->integer('cluster6_t');

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
        Schema::dropIfExists('cpp_mark_adt');
    }
}
