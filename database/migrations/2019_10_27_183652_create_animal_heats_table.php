<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AnimalHeatChildbirthTypeEnum;
use App\Enums\AnimalHeatStatusEnum;

class CreateAnimalHeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_heats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date_animal_heat');//dt cio
            $table->timestamp('date_coverage');//dt cobertura
            $table->timestamp('date_childbirth')->nullable();//dt parto
            $table->timestamp('date_childbirth_foreseen')->nullable(); //dt parto previsto
            $table->string('father')->nullable();//pai
            $table->enum('childbirth_type', AnimalHeatChildbirthTypeEnum::getConstantsValues()); //tipo: insemination ou natural
            $table->enum('status', AnimalHeatStatusEnum::getConstantsValues()); //status: active, inactive ou pending

            $table->integer('responsible_id')->unsigned();//registrado por (usuario)
            $table->foreign('responsible_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->softDeletes();

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
        Schema::dropIfExists('animal_heats');
    }
}
