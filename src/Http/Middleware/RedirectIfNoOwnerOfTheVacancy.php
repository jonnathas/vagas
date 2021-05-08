<?php

namespace Jonnathas\Vagas\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Jonnathas\Vagas\Models\Vacancy; 

class RedirectIfNoOwnerOfTheVacancy
{

    public function handle($request, Closure $next){

        //dd($request->route()->parameters('teste'));

        $vacancy = Vacancy::find($request->route('vacancy'));

        if((isset($vacancy->user_id))&&($vacancy->user_id != auth()->user()->id)){
            return redirect()->back()->with('error','Acesso negado. É preciso ser o criador desta vaga!');
        }
        return $next($request);
    }
}
