<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->boolean('required');
            $table->boolean('multiple');
            $table->boolean('random');
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
        Schema::dropIfExists('picture_choices');
    }
}
