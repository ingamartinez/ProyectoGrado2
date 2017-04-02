<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->enum('sexo', ['H', 'M']);
            $table->string('EPS');
            $table->enum('tipo_sangre', ['O', 'B', 'AB', 'A']);
            $table->enum('RH', ['+', '-']);
            $table->timestamps();
        });

        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('cedula')->unique();
            $table->string('password',255);
            $table->string('nombre');
            $table->string('telefono');
            $table->enum('sexo', ['H', 'M']);
            $table->string('direccion');
            $table->enum('tipo', ['DOCTOR', 'ENFERMERA', 'ENFERMERA JEFE', 'ADMIN', 'ADMICIONISTA']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('registros', function (Blueprint $table) {
            $table->integer('pacientes_id')->unsigned();
            $table->integer('personal_id')->unsigned();

            $table->timestamp('fecha_ingreso')->nullable();
            $table->timestamp('fecha_salida')->nullable();
            $table->timestamps();


            $table->foreign('pacientes_id')
                ->references('id')
                ->on('pacientes');

            $table->foreign('personal_id')
                ->references('id')
                ->on('personal');
            $table->primary(['pacientes_id', 'personal_id']);
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacientes');
        Schema::drop('personal');
        Schema::drop('registros');
    }
}
