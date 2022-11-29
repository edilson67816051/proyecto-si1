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
            $table->float('precio');
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('estado');
            $table->foreign('categoria_id')
            ->references('id')->on('categorias')
            ->onDelete('set null');

     
        });
        DB::table('productos')->insert(array('categoria_id'=>'1','codigo'=>1211,'stock'=>24,'precio'=>110.0,
        'name'=>'Camiseta de Brasil 2022','descripcion'=>'Casaca oficial del Mundial Qatar 2022',
        'imagen'=>'Brasil2022.jpg','estado'=>1));

        DB::table('productos')->insert(array('categoria_id'=>'1','codigo'=>1212,'stock'=>24,'precio'=>92.0,
        'name'=>'Camiseta titular Marathon de Bolivia','descripcion'=>'Casaca oficial de la selcion boliviana 2020',
        'imagen'=>'Bolivia2020.jpg','estado'=>1));

        DB::table('productos')->insert(array('categoria_id'=>'1','codigo'=>1213,'stock'=>24,'precio'=>100.0,
        'name'=>'Camiseta visitante Marathon de Bolivia','descripcion'=>'Casaca oficial de la selcion boliviana 2022',
        'imagen'=>'Bolivia2022.jpg','estado'=>1));

        

        DB::table('productos')->insert(array('categoria_id'=>'1','codigo'=>1214,'stock'=>24,'precio'=>95.0,
        'name'=>'Camiseta titular selección Uruguay','descripcion'=>'Casaca oficial del Mundial Qatar 2022',
        'imagen'=>'Uruguay2022.jpg','estado'=>1));

        DB::table('productos')->insert(array('categoria_id'=>'6','codigo'=>1215,'stock'=>50,'precio'=>40.0,
        'name'=>'Short puma deportivo','descripcion'=>'Shor deportivo comodo',
        'imagen'=>'short.jpg','estado'=>1));

        DB::table('productos')->insert(array('categoria_id'=>'3','codigo'=>1216,'stock'=>50,'precio'=>150.0,
        'name'=>'Telstar 1018','descripcion'=>'Banlon deportivo d futbol',
        'imagen'=>'Telstar 1018.jpg','estado'=>1));

        DB::table('productos')->insert(array('categoria_id'=>'3','codigo'=>1217,'stock'=>40,'precio'=>180.0,
        'name'=>'Jabulani','descripcion'=>'Banlon deportivo d futbol',
        'imagen'=>'Jabulani.jpg','estado'=>1));

        DB::table('productos')->insert(array('categoria_id'=>'4','codigo'=>1218,'stock'=>40,'precio'=>240.0,
        'name'=>'Pin chuteras Adidas','descripcion'=>'Zapatillas deportivos',
        'imagen'=>'chutera1.jpg','estado'=>1));
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
