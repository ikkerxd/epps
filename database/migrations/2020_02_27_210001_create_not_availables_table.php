<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotAvailablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creacion de la tabla no disponible
        Schema::create('not_availables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')
                    ->references('id')->on('transactions')
                    ->onDelete('cascade');
            $table->string('name');
            $table->bigInteger('quantity')->default(0);
            $table->string('attachment');
            $table->text('description');
            $table->integer('state')->default(1);
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
        Schema::dropIfExists('not_availables');
    }
}
