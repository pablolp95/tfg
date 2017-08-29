<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutipleChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutiple_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->boolean('required');
            $table->boolean('multiple');
            $table->boolean('random');
            $table->boolean('vertical');
            $table->boolean('other');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutiple_choices');
    }
}
