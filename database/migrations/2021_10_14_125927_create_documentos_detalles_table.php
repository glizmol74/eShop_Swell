<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ddt_doc_id')->unsigned();
            $table->bigInteger('ddt_prod_id')->unsigned();
            $table->double('ddt_cantidad',18,5);
            $table->double('ddt_precio',18,5);
            $table->double('ddt_tax',18,5);
            $table->string('ddt_descripcion');
            $table->string('ddt_cod_tempo')->nullable();
            $table->foreign('ddt_doc_id')->references('id')->on('documentos');
            $table->foreign('ddt_prod_id')->references('id')->on('productos_atributos');
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
        Schema::dropIfExists('documentos_detalles');
    }
}
