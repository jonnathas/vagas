<?php

namespace Jonnathas\Vagas\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

use Jonnathas\Vagas\Http\Middleware\RedirectIfNoOwnerOfTheVacancy;
use Jonnathas\Vagas\Http\Middleware\RedirectIfNoOwnerOfTheAddress;
use Jonnathas\Vagas\Http\Middleware\HavePhoneRegistered;
use Jonnathas\Vagas\Http\Middleware\HaveCompanyRegistered;

class MiddlewaresServiceProvider extends LaravelServiceProvider
{
    
    private $middlewareAllias = [
        'ownerOfTheVacancy' => RedirectIfNoOwnerOfTheVacancy::class,
        'ownerOfTheAddress' => RedirectIfNoOwnerOfTheAddress::class,
        'HaveCompanyRegistered' => HaveCompanyRegistered::class,
        'HavePhoneRegistered' => HavePhoneRegistered::class
    ];

    public function boot(){

    }

    public function register(){

        $this->loadMiddlewaresAllias(); 

        $this->loadMiddlewaresGroups();

    }
    private function loadMiddlewaresAllias(){
        
        if((isset($this->middlewareAllias))&&( gettype($this->middlewareAllias) == 'array')){
            
            foreach($this->middlewareAllias as $key => $value ){
                
                $this->app['router']->aliasMiddleware($key, $value);
            }
        }
    }
    public function loadMiddlewaresGroups(){
        
        if((isset($this->middlewareAlliasGroup))&&( gettype($this->middlewareAlliasGroup) == 'array')){
            
            foreach($this->middlewareAlliasGroup as $key => $value ){
                
                $this->app['router']->middlewareGroup($key, $value);
            }
        }
    }
}