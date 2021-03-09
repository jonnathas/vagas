<?php

namespace Jonnathas\Vagas\Providers\Traits;

trait ConfigServiceProviderTrait
{
    private function publishConfig(){

    	if(empty($configPath)){
    		return false;
    	}
    	
        $configPath = $this->packagePath($this->configPath.'//'.$this->app_name.'.php');

        $this->publishes([
            $configPath => config_path($this->app_name.'.php'),
        ], "$this->app_name-config");

        $this->mergeConfigFrom($configPath, $this->app_name);
    }

    private function checkSettings($config_name,$callback){
        
        $configs_array = config("$this->app_name.$config_name");
        
        if(($configs_array)&&( gettype($configs_array) == 'array')){
            foreach($configs_array as $data){
                $callback($data);
            }
        }
    }
}