<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('pro_es_nombre');
            $table->string('pro_en_nombre');
            $table->string('pro_es_descripcion')->nullable();
            $table->string('pro_en_descripcion')->nullable();
            $table->text('pro_es_descripcion_larga')->nullable();
            $table->text('pro_en_descripcion_larga')->nullable();
            $table->bigInteger('pro_tipo');
            $table->string('pro_ficha')->nullable();
            $table->string('pro_anmat')->nullable();
            $table->string('pro_senasa')->nullable();
            $table->integer('pro_estado');
            $table->bigInteger('pro_destacado')->nullable()->unsigned();
            $table->bigInteger('pro_imagen_ppal')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::create('productos_categorias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pca_producto')->unsigned();
            $table->bigInteger('pca_categoria')->unsigned();
            $table->bigInteger('pca_add')->unsigned();
            $table->foreign('pca_producto')->references('id')->on('productos');
            $table->foreign('pca_categoria')->references('id')->on('categorias');
            $table->foreign('pca_add')->references('id')->on('users');
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
        Schema::dropIfExists('productos');
        Schema::dropIfExists('productos_categorias');
    }
}
