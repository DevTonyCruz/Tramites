<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno');
            $table->string('direccion');
            $table->string('interior')->nullable();
            $table->string('exterior');
            $table->integer('sepomex_id')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email');
            $table->string('secretaria')->nullable();
            $table->string('demarcacion')->nullable();
            $table->string('distrito')->nullable();
            $table->string('cantidad');
            $table->string('simpatizante');
            $table->longText('foto')->nullable();
            $table->string('ife');
            $table->integer('gestion_id');
            $table->integer('estatus_id');
            $table->integer('remitente_id');
            $table->longText('observaciones')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamp('fecha_ini')->nullable();
            $table->timestamp('fecha_fin')->nullable();
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
        Schema::dropIfExists('tramites');
    }
}
