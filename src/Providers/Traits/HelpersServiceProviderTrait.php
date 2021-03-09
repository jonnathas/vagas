<?php

namespace Jonnathas\Vagas\Providers\Traits;

trait HelpersServiceProviderTrait
{
    private function loadHelper(){
        
     	foreach ($this->helperFiles as $helperFile) {
     		
            if(file_exists($file = $this->packagePath("src/$helperFile.php"))){
                require_once($file);
            }
     	}
    }
}