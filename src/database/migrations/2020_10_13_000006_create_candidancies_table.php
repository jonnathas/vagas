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
            $table->unsignedBigInteger('FK_candidate');
            $table->unsignedBigInteger('FK_vacancy');
            
            $table->foreign('FK_candidate')->references('id')->on('users');

            $table->foreign('FK_vacancy')->references('id')->on('vacancies');
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
