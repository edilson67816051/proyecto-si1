<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('fecha');
            $table->float('monto_total');
            $table->char('estado');

            $table->foreign('proveedor_id')
            ->references('id')->on('proveedors')
            ->onDelete('set null');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');
        });
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nota_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('cantidad');
            $table->float('precio_compra');  
            $table->float('sub_total');                

            $table->foreign('nota_id')
            ->references('id')->on('nota_compras')
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
