<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubClusterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_cluster', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('respondent_id')->unsigned();
            $table->integer('assesment_id')->unsigned();
            $table->foreign('respondent_id')->references('id')->on('respondent')->onDelete('cascade');;
            $table->foreign('assesment_id')->references('id')->on('assesment')->onDelete('cascade');;

            $table->integer('cluster1_1')->default(0);
            $table->integer('cluster1_1_p')->default(0);
            $table->integer('cluster1_2')->default(0);
            $table->integer('cluster1_2_p')->default(0);
            $table->integer('cluster1_3')->default(0);
            $table->integer('cluster1_3_p')->default(0);

            $table->integer('cluster2_1')->default(0);
            $table->integer('cluster2_1_p')->default(0);
            $table->integer('cluster2_2')->default(0);
            $table->integer('cluster2_2_p')->default(0);
            $table->integer('cluster2_3')->default(0);
            $table->integer('cluster2_3_p')->default(0);

            $table->integer('cluster3_1')->default(0);
            $table->integer('cluster3_1_p')->default(0);
            $table->integer('cluster3_2')->default(0);
            $table->integer('cluster3_2_p')->default(0);
            $table->integer('cluster3_3')->default(0);
            $table->integer('cluster3_3_p')->default(0);

            $table->integer('cluster4_1')->default(0);
            $table->integer('cluster4_1_p')->default(0);
            $table->integer('cluster4_2')->default(0);
            $table->integer('cluster4_2_p')->default(0);
            $table->integer('cluster4_3')->default(0);
            $table->integer('cluster4_3_p')->default(0);

            $table->integer('cluster5_1')->default(0);
            $table->integer('cluster5_1_p')->default(0);
            $table->integer('cluster5_2')->default(0);
            $table->integer('cluster5_2_p')->default(0);
            $table->integer('cluster5_3')->default(0);
            $table->integer('cluster5_3_p')->default(0);

            $table->integer('cluster6_1')->default(0);
            $table->integer('cluster6_1_p')->default(0);
            $table->integer('cluster6_2')->default(0);
            $table->integer('cluster6_2_p')->default(0);
            $table->integer('cluster6_3')->default(0);
            $table->integer('cluster6_3_p')->default(0);

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
        Schema::dropIfExists('sub_cluster');
    }
}
