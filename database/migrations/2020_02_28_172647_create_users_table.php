<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('ruc')->unique();
            $table->string('address');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->integer('state')->default(1);
            $table->rememberToken();
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
        
        Schema::dropIfExists('users');
        
    }
}
