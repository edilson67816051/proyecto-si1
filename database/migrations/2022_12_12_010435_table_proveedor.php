<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');         
            $table->unsignedBigInteger('ci');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('ciudad');
            $table->unsignedBigInteger('telefono')->nullable();
            $table->boolean('estado');
        });

        DB::table('proveedors')->insert(array('ci'=>8379254,'nombre'=>'Luciano','apellido'=>'Mayser',
        'ciudad'=>'SC','Telefono'=>78612938,'estado'=>1));

        DB::table('proveedors')->insert(array('ci'=>6549254,'nombre'=>'Maria','apellido'=>'Miranda',
        'ciudad'=>'LP','Telefono'=>68754938,'estado'=>1));

        DB::table('proveedors')->insert(array('ci'=>3654254,'nombre'=>'Lucia','apellido'=>'Fernandez',
        'ciudad'=>'CB','Telefono'=>69354938,'estado'=>1));
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
