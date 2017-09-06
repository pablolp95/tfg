<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('answer_id')->index()->unsigned();
            $table->integer('row_id')->index()->unsigned();
        });

        Schema::table('answer_rows', function(Blueprint $table) {
            $table->foreign('answer_id')
                ->references('id')
                ->on('answers')
                ->onDelete('cascade');

            $table->foreign('row_id')
                ->references('id')
                ->on('rows')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_rows');
    }
}
