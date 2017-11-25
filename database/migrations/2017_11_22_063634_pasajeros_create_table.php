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
            $table->string('telefono_pasajero');
            $table->string('localidad_pasajero');
            $table->string('direccion_pasajero');
            $table->string('nombre_resp')->nullable();
            $table->string('telefono_resp')->nullable();
            $table->string('localidad_resp')->nullable();
            $table->string('direccion_resp')->nullable();
            $table->string('nombre_resp1')->nullable();
            $table->string('telefono_resp1')->nullable();
            $table->string('localidad_resp1')->nullable();
            $table->string('direccion_resp1')->nullable();
            $table->double('total_viaje', 8, 2);
            $table->integer('cuotas');
            $table->double('total_cuotas', 8, 2);
            $table->integer('cuotas_pagadas');
            $table->double('saldo_favor', 8, 2);
            $table->double('total_restante', 8, 2);
            $table->boolean('confirmado')->nullable();
            $table->string('usuario');
            $table->text('observaciones')->nullable();

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
