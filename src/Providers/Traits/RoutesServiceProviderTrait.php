<?php

namespace Jonnathas\Vagas\Providers\Traits;

trait RoutesServiceProviderTrait
{
    private function loadRoutesChannels(){
        
        $this->loadRoutesFrom(
            $this->packagePath($this->routesPath).'/channels.php',
            $this->app_name);
    }

    private function loadRoutesConsole(){
        
        $this->loadRoutesFrom(
            $this->packagePath($this->routesPath).'/console.php',
            $this->app_name);
    }

    private function loadRoutesApi(){
        
        $this->loadRoutesFrom(
            $this->packagePath($this->routesPath).'/api.php',
            $this->app_name);
    }

    private function loadRoutesWeb(){
        
        $this->loadRoutesFrom(
            $this->packagePath($this->routesPath).'/web.php',
            $this->app_name);
    }
}