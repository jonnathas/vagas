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
            $table->unsignedBigInteger('FK_user')->nullable();
            $table->unsignedBigInteger('FK_address')->nullable();
            $table->string('role');
            $table->text('description');
            $table->string('journey');
            $table->string('contract');
            $table->integer('wage');
            $table->timestamps();
            
            $table->foreign('FK_address')->references('id')->on('adresses');

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
        
        /*
        Schema::table('adresses', function (Blueprint $table) {
            $table->dropForeign('vacancies_fk_address_foreign');
        });
        */

        Schema::dropIfExists('vacancies');
    }
}
