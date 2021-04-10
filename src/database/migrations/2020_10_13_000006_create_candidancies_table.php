<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vacancy_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('vacancy_id')->references('id')->on('vacancies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*    
        Schema::table('adresses', function (Blueprint $table) {
            $table->dropForeign('vacancies_fk_address_foreign');
        });
        */

        Schema::dropIfExists('candidancies');
    }
}
