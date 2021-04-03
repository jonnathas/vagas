<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RedirectIfNoOwnerOfTheVacancy
{
<<<<<<< HEAD
    public function handle($request, Closure $next){

        dd($request->route()->parameters());
        
=======
    public function handler($request, Closure $next){

>>>>>>> 2eedbcdd7798c16e08368ad326b13df701d9faa4
        return $next($request);
    }
}
