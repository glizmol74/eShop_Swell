<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('localidads');
        Schema::dropIfExists('provincias');

        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('pro_nombre');
            $table->bigInteger('pro_pais');
            $table->timestamps();
        });

        Schema::table('clientes', function(Blueprint $table) {
            $table->foreign('cli_provincia')->references('id')->on('provincias');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
