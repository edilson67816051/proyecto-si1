<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');         
            $table->unsignedBigInteger('ci');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->char('genero');
            $table->unsignedBigInteger('telefono')->nullable();
            $table->boolean('estado');
        });
        DB::table('clientes')->insert(array('ci'=>8379202,'nombre'=>'Enrrique','apellido_p'=>'Estrada',
        'apellido_m'=>'Fernandez','genero'=>'M','Telefono'=>67812938,'estado'=>1));

        DB::table('clientes')->insert(array('ci'=>6434202,'nombre'=>'Maria','apellido_p'=>'Cayoja',
        'apellido_m'=>'Romero','genero'=>'F','Telefono'=>79873432,'estado'=>1));

        DB::table('clientes')->insert(array('ci'=>8379202,'nombre'=>'Miguel','apellido_p'=>'Chumacero',
        'apellido_m'=>'Peredo','genero'=>'M','Telefono'=>78920182,'estado'=>1));
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
