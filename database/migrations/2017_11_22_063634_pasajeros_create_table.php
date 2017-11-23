<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PasajerosCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_contrato');
            $table->string('nombre_pasajero');
            $table->string('dni_pasajero');
            $table->date('fechanac_pasajero');
            $table->double('total_viaje');
            $table->integer('cuotas');
            $table->integer('total_cuotas');
            $table->integer('cuotas_pagadas');
            $table->double('saldo_favor');
            $table->double('total_restante');
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
        Schema::dropIfExists('pasajeros');
    }
}
