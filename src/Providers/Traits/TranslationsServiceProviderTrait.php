<?php

namespace Jonnathas\Vagas\Providers\Traits;

trait TranslationsServiceProviderTrait
{
    private function loadTranslations()
    {

    	if(empty($this->translationPath)){
    		return false;
    	}

        $translationsPath = $this->packagePath($this->translationPath);

        $this->loadTranslationsFrom($translationsPath, $this->app_name);

        $this->publishes([
            $translationsPath => base_path('resources/lang/vendor/'.$this->app_name),
        ], "$this->app_name-translations");
    }
}