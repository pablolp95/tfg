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
            $table->timestamps();

            $table->text('text');
            $table->text('description')->nullable();
            $table->boolean('required');

            $table->integer('form_id')->index()->unsigned();
            $table->integer('last_update_user_id')->index()->unsigned();

            $table->integer('typable_id');
            $table->string('typable_type');
        });

        Schema::table('questions', function(Blueprint $table) {
            $table->foreign('form_id')
                ->references('id')
                ->on('forms')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('last_update_user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('questions');
    }
}
