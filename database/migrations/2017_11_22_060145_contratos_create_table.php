<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContratosCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_contrato');
            $table->string('programa_contrato');
            $table->string('destino_contrato');
            $table->string('establecimiento_contrato');
            $table->date('fechav_contrato');
            $table->double('total')->nullable();
            $table->double('pagado')->nullable();
            $table->double('deuda')->nullable();
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
        Schema::dropIfExists('contrato');
    }
}
