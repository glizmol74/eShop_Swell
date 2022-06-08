<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cli_cod')->nullable();
            $table->string('cli_razon');
            $table->bigInteger('cli_cuit')->unique();
            $table->string('cli_direccion');
            $table->string('cli_entre_calles')->nullable();
            $table->integer('cli_telefono')->nullable();
            $table->integer('cli_whatsapp')->nullable();
            $table->decimal('cli_saldo');
            $table->bigInteger('cli_tipo')->unsigned();
            $table->bigInteger('cli_cod_postal')->nullable()->unsigned();
            $table->bigInteger('cli_pais')->nullable()->unsigned();
            $table->bigInteger('cli_provincia')->nullable()->unsigned();
            $table->bigInteger('cli_estado');
            $table->bigInteger('cli_user')->nullable()->unsigned();
            $table->foreign('cli_tipo')->references('id')->on('perfiles');
            $table->foreign('cli_user')->references('id')->on('users');
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
        Schema::dropIfExists('clientes');
    }
}
