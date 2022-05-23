<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('doc_tipo');
            $table->integer('doc_numero')->nullable();
            $table->date('doc_fecha');
            $table->date('doc_fecha_entrega');
            $table->integer('doc_estado');
            $table->bigInteger('doc_cliente')->unsigned();
            $table->double('doc_subtotal',18,5);
            $table->double('doc_descuento_p',18,5)->nullable();
            $table->double('doc_descuento_v',18,5)->nullable();
            $table->double('doc_tax',18,5)->nullable();
            $table->double('doc_iva', 18,5)->nullable();
            $table->double('doc_total',18,5);
            $table->double('doc_costo_envio',18,5)->nullable();
            $table->double('doc_total_pago',18,5)->nullable();
            $table->string('doc_observacion')->nullable();
            $table->string('doc_numero_tempo')->nullable();
            $table->string('doc_cae')->nullable();
            $table->date('doc_fechavtocae')->nullable();
            $table->string('doc_barcode')->nullable();
            $table->integer('doc_ok');
            $table->foreign('doc_cliente')->references('id')->on('clientes');
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
        Schema::dropIfExists('documentos');
    }
}
