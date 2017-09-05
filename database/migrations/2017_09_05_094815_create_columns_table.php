<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('value');
            $table->integer('position');
            $table->integer('grid_id')->index()->unsigned();
        });

        Schema::table('columns', function(Blueprint $table) {
            $table->foreign('grid_id')
                ->references('id')
                ->on('grids')
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
        Schema::dropIfExists('columns');
    }
}
