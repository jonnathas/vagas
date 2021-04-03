<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RedirectIfNoOwnerOfTheVacancy
{
    public function handler($request, Closure $next){

        return $next($request);
    }
}
