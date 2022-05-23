<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosAtributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_atributos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pat_prod')->unsigned();
            $table->bigInteger('pat_attr')->unsigned();
            $table->bigInteger('pat_imagen')->nullable()->unsigned();
            $table->float('pat_precio_usr',12, 3)->nullable();
            $table->float('pat_precio_emp',12, 3)->nullable();
            $table->float('pat_precio_esp',12, 3)->nullable();
            $table->float('pat_precio_dst',12, 3)->nullable();
            $table->string('pat_cod_tempo')->nullable();
            $table->bigInteger('pat_estado')->nullable();
            $table->bigInteger('pat_orden')->nullable();
            $table->bigInteger('pat_add')->unsigned();
            $table->foreign('pat_prod')->references('id')->on('productos');
            $table->foreign('pat_attr')->references('id')->on('atributos');
            $table->foreign('pat_imagen')->references('id')->on('bibliotecas');
            $table->foreign('pat_add')->references('id')->on('users');
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
        Schema::dropIfExists('productos_atributos');
    }
}
