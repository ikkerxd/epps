<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('tipo_movimiento')->default(1);
            $table->date('date');
            //cantidad comprada o vendida
            $table->bigInteger('total');
            $table->decimal('igv')->default(0.18);
            $table->integer('state')->default(1);
            $table->timestamps();
        });
        //detalle de movimientos y productos
        Schema::create('detalle_movimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_movimiento');
            $table->foreign('id_movimiento')
                ->references('id')->on('movimientos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_products');
            $table->foreign('id_products')
                ->references('id')->on('products')
                ->onDelete('cascade');
            $table->bigInteger('count');
            $table->decimal('price_unit');
            $table->integer('state')->default(1);
            $table->timestamps();
            //
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('detalle_movimiento');
        Schema::dropIfExists('movimientos');
    }
}
