<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){


    Route::get('/vacancy','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@index');
    Route::get('/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\Vacancy@show');
    Route::post('/vacancy/{id}/candidancy','Jonnathas\Vagas\Http\Controllers\Candidate\Candidancy@store');
    
    Route::group(['middleware'=>'auth'],function(){
        
        //Curriculo
        Route::get('/curriculum','Jonnathas\Vagas\Http\Controllers\Candidate\CurriculumController@index')->name('curriculum.index');
        
        Route::get('/personal-data/{id}/edit','Jonnathas\Vagas\Http\Controllers\Candidate\PersonalDataController@edit')->name('personal_data.edit');
        Route::post('/personal-data/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\PersonalDataController@update')->name('personal_data.update');

        //telefone
        Route::get('/phone/{id}/edit','Jonnathas\Vagas\Http\Controllers\Candidate\PhoneController@edit');
        Route::get('/phone/create','Jonnathas\Vagas\Http\Controllers\Candidate\PhoneController@create');
        Route::post('/phone','Jonnathas\Vagas\Http\Controllers\Candidate\PhoneController@store');
        Route::put('/phone/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\PhoneController@update');
        Route::delete('/phone/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\PhoneController@delete');

        //endereços
        Route::get('/address/create','Jonnathas\Vagas\Http\Controllers\Candidate\AddressController@create');
        Route::post('/address','Jonnathas\Vagas\Http\Controllers\Candidate\AddressController@store');
        Route::get('/address/{id}/edit','Jonnathas\Vagas\Http\Controllers\Candidate\AddressController@edit');
        Route::put('/address/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\AddressController@update');
        Route::delete('/address/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\AddressController@delete');

        //Recrutador
        Route::get('/recruiter/vacancy/create','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@create');
        Route::get('/recruiter/vacancy/','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@index');
        Route::get('/recruiter/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@show');
        Route::post('/recruiter/vacancy','Jonnathas\Vagas\Http\Controllers\Recruiter\Vacancy@store');
        
    });
});