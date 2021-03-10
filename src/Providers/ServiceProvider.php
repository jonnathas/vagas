<?php

namespace Jonnathas\Vagas\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

use Jonnathas\Vagas\Providers\Traits\RoutesServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\MiddlewaresServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\ConfigServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\TranslationsServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\AssetsServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\MigrationsServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\ControllersServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\ViewsServiceProviderTrait;
use Jonnathas\Vagas\Providers\Traits\HelpersServiceProviderTrait;


class ServiceProvider extends LaravelServiceProvider
{
    use 
        RoutesServiceProviderTrait,
        MiddlewaresServiceProviderTrait,
        ConfigServiceProviderTrait,
        TranslationsServiceProviderTrait,
        AssetsServiceProviderTrait,
        MigrationsServiceProviderTrait,
        ControllersServiceProviderTrait,
        ViewsServiceProviderTrait,
        HelpersServiceProviderTrait;
        

    private $routesPath = 'routes';
    private $app_name = 'vagas';
    private $configPath = 'config';
    private $controllersPath = 'Http/Controllers';
    private $migrationsPath = 'database/migrations';
    private $viewPath = 'resources/views';
    private $providers =
        [   
            //'Jonnathas\Vagas\Providers\AuthorizationServiceProvider',
            //'Jonnathas\Vagas\Providers\CommandsServiceProvider'
            //'Jonnathas\Vagas\Providers\RoutesServiceProvider'
        ];

    public function boot(){
        
    }

    public function register(){

        $this->providersRegister();

        $this->loadRoutesWeb();
        
        $this->loadMiddlewaresAllias(); 

        $this->loadTranslations();

        $this->loadMigrations();

        $this->publishConfig();

        $this->publishAssets();

        $this->publishControllers();

        $this->loadViews();
    }

    public function providersRegister(){
        
        foreach($this->providers as $provider){
            $this->app->register($provider);
        }

    }

    public function packagePath($path){
    
        return __DIR__."/../$path";
    
    }    
}