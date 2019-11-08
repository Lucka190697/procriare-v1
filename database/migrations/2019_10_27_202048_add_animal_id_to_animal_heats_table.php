<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnimalIdToAnimalHeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animal_heats', function (Blueprint $table) {
            $table->integer('animal_id')->unsigned()->nullable();
            $table->foreign('animal_id')
                ->references('id')
                ->on('animal_heats')
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
        Schema::table('animal_heats', function (Blueprint $table) {
            $table->dropForeign(['animal_id']);
            $table->dropColumn(['animal_id']);
        });
    }
}
