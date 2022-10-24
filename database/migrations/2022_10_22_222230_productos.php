<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id')->nullable();
            
            $table->unsignedBigInteger('codigo');
            $table->string('name');
            $table->unsignedBigInteger('stock');
            $table->string('descripcion')->nullable();
            $table->string('imagen');

            $table->foreign('categoria_id')
            ->references('id')->on('categorias')
            ->onDelete('set null');

     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
