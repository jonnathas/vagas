<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('FK_user');
            $table->unsignedBigInteger('FK_state');
            $table->string('place');
            $table->string('complement');
            $table->integer('number');
            $table->timestamps();
            
            $table->foreign('FK_state')->references('id')->on('states');
            $table->foreign('FK_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('adresses');
    }
}
