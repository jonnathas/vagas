<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('FK_user');
            $table->string('school_name');
            $table->string('course_name');

            $table->enum('course_level',['básico','médio','técnico','universitário','especialização','mestrado','doutorado','livre_docência','adjunto','titular','mba']);
            
            $table->string('country');
            $table->enum('status',['completo','cursando']);

            $table->date('start');
            $table->date('end')->nullable();
            $table->timestamps();

            $table->foreign('FK_user')->references('id')->on('users');

        });
            /*

            significado para as siglas do campo school_level

            basico => 'b'
            médio => 'md'
            técnico => 'te'
            universitário => 'u'
            especialização => 'e'
            mestrado => 'mt'
            doutorado => 'd'
            livre_docência => 'ld'
            adjunto => 'a'
            titular => 'ti'
            mba => 'mba'



            Referêcia:
            https://documentacao.senior.com.br/gestao-de-pessoas-hcm/6.2.34/vetorh/fr127fas.htm

            */
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_experiences');
    }
}
