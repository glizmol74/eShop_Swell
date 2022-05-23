<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menues', function (Blueprint $table) {
            $table->id();
            $table->string('men_nombre');
            $table->text('men_descripcion');
            $table->string('men_icono')->nullable();
            $table->integer('men_level')->nullable();            
            $table->string('men_link')->nullable();    
            $table->boolean('men_es_menu');            
            $table->bigInteger('men_add')->unsigned();         
            $table->foreign('men_add')->references('id')->on('users'); 
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
        Schema::dropIfExists('menues');
    }
}
