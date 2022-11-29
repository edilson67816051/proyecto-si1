<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('fecha');
            $table->float('total_venta');
            $table->char('estado');
            $table->float('decuento');

            $table->foreign('cliente_id')
            ->references('id')->on('clientes')
            ->onDelete('set null');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');
        });
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nota_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('cantidad');
            $table->float('precio_venta');  
            $table->float('sub_total');                

            $table->foreign('nota_id')
            ->references('id')->on('nota_ventas')
            ->onDelete('set null');

            $table->foreign('producto_id')
            ->references('id')->on('productos')
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
