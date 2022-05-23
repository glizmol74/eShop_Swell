<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('localidads', function (Blueprint $table) {
            $table->id();
            $table->string('loc_nombre');
            $table->bigInteger('loc_provincia')->unsigned();
            $table->bigInteger('loc_comuna')->nullable();
            $table->bigInteger('loc_codigo_postal');
            $table->foreign('loc_provincia')->references('id')->on('provincias');
            $table->timestamps();
        });

       Schema::table('clientes', function(Blueprint $table) {
            $table->foreign('cli_cod_postal')->references('id')->on('localidads');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidads');
    }
}
