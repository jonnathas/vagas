<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){

    Route::get('/vacancy','Jonnathas\Vagas\Http\Controllers\Candidate\VacancyController@index');
    Route::get('/vacancy/{id}','Jonnathas\Vagas\Http\Controllers\Candidate\VacancyController@show');
    Route::post('/vacancy/{id}/candidancy','Jonnathas\Vagas\Http\Controllers\Candidate\CandidancyController@store');
    
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
        
        Route::get('/address/{address}/active','AddressController@active')
            ->name('address.active')
            ->middleware('ownerOfTheAddress');

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
        Route::get('/recruiter/vacancy/create','VacancyController@create')->middleware(['HavePhoneRegistered','HaveCompanyRegistered']);
        Route::get('/recruiter/vacancy/','VacancyController@index');
        Route::get('/recruiter/vacancy/{vacancy}','VacancyController@show')->middleware('ownerOfTheVacancy');
        Route::post('/recruiter/vacancy','VacancyController@store')->middleware(['HavePhoneRegistered','HaveCompanyRegistered']);

        //candidatura
        Route::get('/recruiter/vacancy/{vacancy}/candidate/{candidate}','CandidancyController@showCandidate')->middleware('ownerOfTheVacancy');

        //Compania
        Route::get('/recruiter/company','CompanyController@create');
        Route::post('/recruiter/company','CompanyController@store');
        Route::get('/recruiter/company/{company}/edit','CompanyController@edit');
        Route::put('/recruiter/company/{company}','CompanyController@update');
        
    });
});
