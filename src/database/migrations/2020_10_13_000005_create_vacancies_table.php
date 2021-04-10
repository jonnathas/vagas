<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('role');
            $table->text('description');
            $table->string('journey');
            $table->string('contract');
            $table->integer('wage');
            $table->timestamps();
            
            $table->foreign('address_id')->references('id')->on('adresses');

            $table->foreign('user_id')->references('id')->on('users');
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

        Schema::dropIfExists('vacancies');
    }
}
