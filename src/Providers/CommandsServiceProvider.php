<?php 

namespace Jonnathas\Vagas\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
//use Jonnathas\Acl\Commands\AclPanelInit;

class CommandsServiceProvider extends LaravelServiceProvider
{
	public function register(){
		
		/*

		$this->commands([
			AclPanelInit::Class,		
		]);

		*/
	}
	public function boot(){

	}

}