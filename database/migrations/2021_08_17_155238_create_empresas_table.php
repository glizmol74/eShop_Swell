<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('emp_nombre')->unique();
            $table->string('emp_app');
            $table->string('emp_direccion')->nullable();
            $table->string('emp_telefono')->nullable();
            $table->string('emp_whatsapp')->nullable();
            $table->string('emp_cuit')->nullable();
            $table->string('emp_logo')->nullable();            
            $table->bigInteger('emp_perfil_base')->nullable()->unsigned();;    
            $table->string('emp_email')->nullable();
            $table->string('emp_admin')->nullable();
            $table->string('emp_ventas')->nullable();
            $table->longText('emp_mapa')->nullable()->create();    
            $table->bigInteger('emp_add')->nullable()->unsigned();    
            $table->foreign('emp_add')->references('id')->on('users');
         //   $table->foreign('emp_perfil_base')->references('id')->on('perfiles');
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
        Schema::dropIfExists('empresas');
    }
}
