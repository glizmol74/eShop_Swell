<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreatePaginaHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_homes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sli_tipo')->nullable();
            $table->bigInteger('sli_posicion')->nullable();
            $table->string('sli_extra');
            $table->string('sli_align')->nullable();
            $table->string('sli_justify')->nullable();
            $table->string('sli_padding')->nullable();
            $table->string('sli_margin')->nullable();
            $table->string('sli_background_text')->nullable();
            $table->string('sli_text_es')->nullable();
            $table->string('sli_text_en')->nullable();
            $table->string('sli_class')->nullable();
            $table->string('sli_colortext')->nullable();
            $table->string('sli_color')->nullable();
            $table->bigInteger('sli_imagen')->unsigned();
            $table->bigInteger('sli_add')->unsigned();
            $table->string('sli_ref')->nullable();
            $table->foreign('sli_imagen')->references('id')->on('bibliotecas');
            $table->foreign('sli_add')->references('id')->on('users');
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
        Schema::dropIfExists('pagina_homes');
    }
}
