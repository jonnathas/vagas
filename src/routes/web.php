<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){

    Route::get('/vacancy','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@index');
    
    Route::group(['middleware'=>'auth'],function(){
        
        Route::get('/recruiter/vacancy','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@index');
        Route::post('/recruiter/vacancy','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@store');
        Route::get('/recruiter/vacancy/create','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@create');
    });
});