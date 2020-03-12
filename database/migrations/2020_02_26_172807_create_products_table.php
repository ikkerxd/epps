<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('category')
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            //contenido es una descripcion mas especifica del producto
            $table->text('content');
            $table->string('image')->nullable();
            $table->decimal('price');
            $table->string('metric');
            $table->string('brand')->nullable();
            $table->string('color');
            $table->text('datasheet');
            $table->integer('stock')->nullable();
            $table->integer('stock_min')->default(0);
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
        
        Schema::dropIfExists('products');
        
    }
}
