<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('workspace_id')->index()->unsigned();
            $table->integer('last_update_user_id')->index()->unsigned();

            $table->string('name');
        });

        Schema::table('forms', function(Blueprint $table) {
            $table->foreign('workspace_id')
                ->references('id')
                ->on('workspaces')
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
        Schema::dropIfExists('forms');
    }
}
