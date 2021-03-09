<?php

namespace Jonnathas\Vagas\Providers\Traits;

trait MigrationsServiceProviderTrait
{
    private function loadMigrations(){
        
    	if(empty($this->migrationsPath)){
    		return false;
    	}
        

        $this->migrationsPath = $this->packagePath($this->migrationsPath);

        $this->loadMigrationsFrom($this->migrationsPath, $this->app_name);

        $this->publishes([
            $this->migrationsPath => base_path('database/migrations'),
        ], "$this->app_name-migrations");
    }
}