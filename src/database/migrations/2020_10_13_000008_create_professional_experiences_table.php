<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_experiences', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('FK_user');
            $table->string('company');
            $table->text('description');
            $table->string('role');
            $table->date('start');
            $table->date('end')->nullable();

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
        Schema::dropIfExists('professional_experiences');
    }
}
