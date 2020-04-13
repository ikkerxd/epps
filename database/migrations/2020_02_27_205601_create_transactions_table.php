<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('type')->nullable();
            $table->bigInteger('nro_transaction')->nullable();
            $table->bigInteger('nro_guide')->nullable();
            $table->date('date');
            //cantidad comprada o vendida
            $table->bigInteger('total');
            $table->decimal('igv')->nullable();
            $table->string('process')->default('request');
            $table->integer('state')->default(1);
            $table->timestamps();
        });
        //detalle de movimientos y productos
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')
                ->references('id')->on('transactions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
            $table->bigInteger('quantity');
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
        
        Schema::dropIfExists('details');
        Schema::dropIfExists('transactions');
    }
}
