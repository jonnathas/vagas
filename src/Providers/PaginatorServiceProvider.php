<?php 
namespace Jonnathas\Vagas\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


class PaginatorServiceProvider extends LaravelServiceProvider{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register(){

    }

    public function boot()
    {
        Paginator::useBootstrap();
    }
}
