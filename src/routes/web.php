<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){


    Route::get('/vacancy','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@index');
    Route::get('/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@show');
    Route::post('/vacancy/{id}/candidancy','Jonnathas\Vagas\Http\Controllers\Candidate\Candidancy@store');
    
    Route::group(['middleware'=>'auth'],function(){
        
        //Candidato
        Route::get('/personal-data/create','Jonnathas\Vagas\Http\Controllers\Candidate\PersonalData@create')->name('personal_data.create');
        Route::get('/personal-data','Jonnathas\Vagas\Http\Controllers\Candidate\PersonalData@index')->name('personal_data.index');
        Route::post('/personal-data','Jonnathas\Vagas\Http\Controllers\Candidate\PersonalData@store')->name('personal_data.store');
        


        //Recrutador
        Route::get('/recruiter/vacancy/create','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@create');
        Route::get('/recruiter/vacancy/','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@index');
        Route::get('/recruiter/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@show');
        Route::post('/recruiter/vacancy','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@store');
        
    });
});