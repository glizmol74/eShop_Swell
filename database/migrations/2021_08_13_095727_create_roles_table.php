<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rol_perfil')->unsigned();
            $table->bigInteger('rol_menu')->unsigned();
            $table->bigInteger('rol_add')->unsigned();
            $table->foreign('rol_perfil')->references('id')->on('perfiles');
            $table->foreign('rol_menu')->references('id')->on('menues');
            $table->foreign('rol_add')->references('id')->on('users');
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
        Schema::dropIfExists('roles');
    }
}
