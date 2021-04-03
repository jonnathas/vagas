<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RedirectIfNoOwnerOfTheVacancy
{
    public function handle($request, Closure $next){

        dd($request->route()->parameters());
        
        return $next($request);
    }
}
