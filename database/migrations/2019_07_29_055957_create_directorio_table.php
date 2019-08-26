<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno')->nullable();
            $table->string('direccion');
            $table->string('interior')->nullable();
            $table->string('exterior');
            $table->integer('sepomex_id')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();

            $table->longText('facebook')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('twitter')->nullable();

            $table->integer('id_profesion')->nullable();
            $table->integer('id_grupos')->nullable();

            $table->timestamp('fecha_contacto')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_nacimiento')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_importante')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('concepto_fecha_importante');

            $table->integer('dia_contacto')->nullable();
            $table->integer('mes_contacto')->nullable();
            $table->integer('dia_nacimiento')->nullable();
            $table->integer('mes_nacimiento')->nullable();
            $table->integer('dia_importante')->nullable();
            $table->integer('mes_importante')->nullable();

            $table->longText('observaciones')->nullable();
            $table->string('distrito')->nullable();
            $table->string('demarcacion')->nullable();
            $table->string('seccional')->nullable();

            $table->string('coordinador_zona')->nullable();
            $table->string('coordinador_demarcacion')->nullable();
            $table->string('distrito_politico')->nullable();
            $table->string('demarcacion_politico')->nullable();
            $table->string('seccional_politico')->nullable();
            $table->integer('sepomex_id_politico')->nullable();

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
        Schema::dropIfExists('directorio');
    }
}
