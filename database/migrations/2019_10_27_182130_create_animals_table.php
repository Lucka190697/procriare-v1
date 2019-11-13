<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalClassEnum;
use App\Enums\AnimalStatusEnum;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');//id
            $table->integer('code');//codigo do brinco
            $table->string('name');//nome
            $table->timestamp('born_date');//dt_nasc
            $table->enum('sex', AnimalSexEnum::getConstantsValues()); // sexo > male || femeale
            $table->enum('class', AnimalClassEnum::getConstantsValues());// classificação ;
            $table->string('breed')->nullable();//raça
            $table->enum('status', AnimalStatusEnum::getConstantsValues());
            $table->string('thumbnail')->nullable();

            $table->string('mother')->nullable();
            $table->string('father')->nullable();

            $table->integer('farm_id')->unsigned();
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
                ->onDelete('cascade');

            $table->integer('responsible_id')->unsigned();
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
        Schema::dropIfExists('animals');
    }
}
