<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descripcion')->nullable();
            $table->boolean('estado');
        });
        DB::table('categorias')->insert(array('name'=>'Casacas','descripcion'=>'utilizada por ejemplo por los futbolistas','estado'=>1));
        DB::table('categorias')->insert(array('name'=>'Gorra','descripcion'=>'exclusivo para cubrir la cabeza del sol','estado'=>1));
        DB::table('categorias')->insert(array('name'=>'Balones','descripcion'=>'Balones exclusivo para uso deportivo ','estado'=>1));
        DB::table('categorias')->insert(array('name'=>'Zapatilla','descripcion'=>'Utilizada para uso deportivo','estado'=>1));
        DB::table('categorias')->insert(array('name'=>'Media','descripcion'=>'utilizada para uso deportivo','estado'=>1));
        DB::table('categorias')->insert(array('name'=>'Shores','descripcion'=>'se tendra de todo tipo de shores ','estado'=>1));
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
