<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){


    Route::get('/vacancy','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@index');
    Route::get('/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@show');
    Route::post('/vacancy/{id}/candidancy','Jonnathas\Vagas\Http\Controllers\Candidate\Candidancy@store');
    
    Route::group([
        'middleware'=>'auth',
        'namespace'=>'Jonnathas\Vagas\Http\Controllers\Candidate'
    ],function(){
        
        //Curriculo
        Route::get('/curriculum','CurriculumController@index')->name('curriculum.index');
        
        Route::get('/personal-data/{id}/edit','PersonalDataController@edit')->name('personal_data.edit');
        Route::post('/personal-data/{id}','PersonalDataController@update')->name('personal_data.update');

        //telefone
        Route::resource('/phone','PhoneController')->except(['index','show']);
        
        //endereços
        Route::resource('/address','AddressController')->except(['index','show']);

        //formações acadêmicas
        Route::resource('/academic-experience','AcademicExperienceController')->except(['index','show']);
     
        //Experiencias proficionais
        Route::resource('/professional-experience','ProfessionalExperienceController')->except(['index','show']);
     
    });

    Route::group([
        'middleware'=>'auth',
        'namespace' => 'Jonnathas\Vagas\Http\Controllers\Recruiter'
    ],function(){
        
        //Vagas
        Route::get('/recruiter/vacancy/create','Vacancy@create');
        Route::get('/recruiter/vacancy/','Vacancy@index');
        Route::get('/recruiter/vacancy/{id}','Vacancy@show');
        Route::post('/recruiter/vacancy','Vacancy@store');

        //candidatura
        Route::get('/recruiter/vacancy/{vacancy}/candidate/{candidate}','Candidancy@showCandidate');
    });
});