<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){

    Route::get('/vacancy','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@index');

    Route::get('/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@show');
    Route::post('/vacancy/{id}/candidancy','Jonnathas\Vagas\Http\Controllers\Candidate\Candidancy@store');
    
    Route::group(['middleware'=>'auth'],function(){
        
        Route::get('/recruiter/vacancy/create','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@create');
        Route::get('/recruiter/vacancy/','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@index');
        Route::get('/recruiter/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@show');
        Route::post('/recruiter/vacancy','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@store');
        
    });
});