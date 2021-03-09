<?php

namespace Jonnathas\Vagas\Providers\Traits;

trait MiddlewaresServiceProviderTrait
{
    private function loadMiddlewaresAllias(){
        
        $middlewares = config("$this->app_name.middlewareAllias");
        
        if(($middlewares)&&( gettype($middlewares) == 'array')){
            
            foreach($middlewares as $key => $value ){
                
                $this->app['router']->aliasMiddleware($key, $value);
            }
        }
    }
}